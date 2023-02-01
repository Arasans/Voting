<?php

namespace App\Http\Controllers;

use App\Mail\PaidMail;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Mail\PendingMail;

class VoucherController extends Controller
{
    // public $check = false;
    public function index()
    {

        return view('voucher');
    }
    public function payment(Request $request)
    {
        $jumlah = $request->jumlah;


        $jumlah = intval(str_replace(",", "", $jumlah));
        // dd($jumlah);
        // $request->request->add(['status' => 'Unpaid']);
        $data = [
            'price' => $jumlah,
            'phone' => $request->nohp,
            'email' => $request->email,
            'name' => $request->nama,
            'status' => "Unpaid",
            'id' => rand()
        ];
        $data = Order::create($data);
        // $request->request->jumlah;
        // dd($request->all());


        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $data->id,
                'gross_amount' => $data->price,
            ),
            'customer_details' => array(
                'first_name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->nohp,
            ),
        );


        $snapToken = \Midtrans\Snap::getSnapToken($params);
        // $check = true;
        // dd($snapToken);
        return view('checkout', compact('snapToken',  'data'));
    }
    public function callback(Request $request)
    {
        $serverKey = config('midtrans.server_key');
        $hashed = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashed == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $randomString = Str::random(15);
                $order = Order::find($request->order_id);
                $jumlah = $request->gross_amount;
                $jumlah = $jumlah / 2500;
                $order['jumlah'] = $jumlah;
                $pdf = $request->get('pdf_url');
                $payment_type = $request->get('payment_type');
                $order['pdf_url'] = $pdf;
                $order['voucher'] = $randomString;
                $order['payment_type'] = $payment_type;
                $order->update(['status' => 'Paid']);
                $order->save();
                $details = [
                    'name' => $order->name,
                    'email' => $order->email,
                    'kode' => $randomString
                ];
                \Illuminate\Support\Facades\Mail::to($details['email'])->send(new PaidMail($details));
            }
            // else if ($request->transaction_status == 'pending') {
            //     $order = Order::find($request->order_id);
            //     $payment_type = $request->get('payment_type');
            //     $order['payment_type'] = $payment_type;
            //     $order->save();
            //     // $details = [
            //     //     'name' => "sadasdsd",
            //     //     'email' => "sadsadas",
            //     // ];
            //     // \Illuminate\Support\Facades\Mail::to("aderakasantana@gmail.com")->send(new PendingMail($details));
            // }
        } else {
        }
    }

    public function invoice($id)
    {
        $order = Order::find($id);
        return view('invoice', compact('order'));
    }
    public function save(Request $request)
    {
        // dd($request->get('json'));
        $json = json_decode($request->get('json'));
        $order = Order::find($json->order_id);
        $order->payment_type = $json->payment_type;
        $order->pdf_url = isset($json->pdf_url) ? $json->pdf_url : null;
        $details = [
            'name' => $order->name,
            'email' => $order->email,
            'pdf' => isset($json->pdf_url) ? $json->pdf_url : null,
            'kode' => isset($order->voucher) ? $order->voucher : null
        ];
        if ($json->transaction_status == 'pending') {
            \Illuminate\Support\Facades\Mail::to($details['email'])->send(new PendingMail($details));
        }
        // else if ($json->transaction_status == 'capture' || $json->transaction_status == 'settlement') {
        //     \Illuminate\Support\Facades\Mail::to($details['email'])->send(new PaidMail($details));
        // }

        return $order->save() ? redirect(url('/'))->with('alert-success', 'Order berhasil dibuat') : redirect(url('/'))->with('alert-failed', 'Terjadi kesalahan');
    }
}
