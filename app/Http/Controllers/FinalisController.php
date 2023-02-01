<?php

namespace App\Http\Controllers;

use App\Models\Finalis;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FinalisController extends Controller
{
    public function index(Request $request)
    {
        $currentYear = Carbon::now()->year;
        $finalis = Finalis::where('tahun', $currentYear)->get();

        return view('finalis', [
            "finalis" => $finalis
        ]);
    }

    public function post(Request $request)
    {
        $id = $request->json;
        $currentYear = Carbon::now()->year;
        $finalis = Finalis::where('tahun', $currentYear)->get();
        // dd($id);
        return view('finalismodal', compact('id'), [
            "finalis" => $finalis

        ]);
    }

    public function kode(Request $request)
    {

        $kode = $request->voucher;
        $finalis = $request->json;
        // dd($finalis);
        $cek = Order::where('voucher', $kode)->where('vote', '0')->count();
        // dd($cek);
        if ($cek == 1) {
            $finalis = Finalis::find($finalis);
            $order = Order::where('voucher', $kode)->value('id');
            $order = Order::find($order);
            $order['vote'] = "1";
            $finalis['votings'] += $order['jumlah'];
            $finalis->save();
            $order->save();
            // dd($id);

            return redirect('/finalis')->with('success', 'Berhasil Vote');
        } else {
            return redirect('/finalis')->with('Fail', 'Voucher Tidak Ditemukan/Sudah Digunakan');
        }

        // dd($cek);
    }
}
