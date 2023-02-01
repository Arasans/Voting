@extends('layouts.main')
@section('section')

@section('css')
     <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
     <script type="text/javascript"
     src="https://app.sandbox.midtrans.com/snap/snap.js"
     data-client-key="{{ config('midtrans.client_key') }}"></script>
   <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

@endsection

<section id="Input" class="h-screen flex flex-wrap  items-center justify-center">
  
    <div class="container lg:w-4/12 md:w-4/6 w-4/5">      
            <div class="mb-10">
                <label
                  for="nama"
                  class="mb-2 block text-lg font-medium text-gray-900"
                  >Nama</label>
                <input
                disabled
                value="{{ $data->name }}"
                  type="text"
                  name="nama"
                  required
                  placeholder="Nama"
                  id="nama"
                  class="shadow-sm block w-full rounded-lg border  bg-gray-50 p-2.5 text-gray-900 focus:border-primary focus:bg-white focus:text-gray-700 focus:outline-none sm:text-sm"
                />
            </div>
            
            <div class="mb-10">
                <label
                  for="email"
                  class="mb-2 block text-lg font-medium text-gray-900"
                  >Email</label>
                <input
                disabled
                value="{{ $data->email }}"
                  type="email"
                  name="email"
                  required
                  placeholder="Email"
                  id="email"
                  class="shadow-sm block w-full rounded-lg border  bg-gray-50 p-2.5 text-gray-900 focus:border-primary focus:bg-white focus:text-gray-700 focus:outline-none sm:text-sm"
                />
            </div>
            <div class="mb-10">
                <label
                  for="nohp"
                  class="mb-2 block text-lg font-medium text-gray-900"
                  >No Hp</label>
                <input
                disabled
                value="{{ $data->phone }}"
                  type="nohp"
                  name="nohp"
                  required
                  placeholder="No Hp"
                  id="nohp"
                  class="shadow-sm block w-full rounded-lg border  bg-gray-50 p-2.5 text-gray-900 focus:border-primary focus:bg-white focus:text-gray-700 focus:outline-none sm:text-sm"
                />
            </div>

            <div class="mb-10">
                <label
                  for="currency-input"
                  class="mb-2 block text-lg font-medium text-gray-900"
                  >Harga</label>
                  <div class="flex">
                    <h1 class=" text-lg font-medium text-gray-900 flex items-center">Rp.</h1>
                      <input disabled
                      value="{{ $data->price }}" autocomplete="off" class="shadow-sm block w-full rounded-lg border  bg-gray-50 p-2.5 text-gray-900 focus:border-primary focus:bg-white focus:text-gray-700 focus:outline-none sm:text-sm" id="currency-input" type="text" name="jumlah" placeholder="Harga" oninput="checkNumber(event)">
                  </div>
            </div>
            <div class="justify-center w-full flex flex-wrap">

                <button id="pay-button" type="submit" class=" bg-button py-2 px-10 font-medium text-white rounded-lg shadow-md transition ease-in-out hover:bg-secondary hover:text-button focus:bg-secondary focus:bg-opacity-25 focus:text-button  duration-500  ">
                    Bayar
                </button>
            </div>        
    </div>
</section>


<form action="/vouchers" id="submit_form" method="POST">
  @csrf
  <input type="hidden" name="json" id="json_callback">
</form>
@section('java')
<script type="text/javascript">
    // For example trigger on button clicked, or any time you need
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
      // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
      window.snap.pay('{{ $snapToken }}', {
        onSuccess: function(result){
          /* You may add your own implementation here */
          alert("payment success!, please check your email"); console.log(result);
          // window.location.href='/voucher'
          send_response_to_form(result);

        },
        onPending: function(result){
          /* You may add your own implementation here */
          alert("wating your payment!, please check your email"); console.log(result);
          // window.location.href='/voucher'
          send_response_to_form(result);


        },
        onError: function(result){
          /* You may add your own implementation here */
          alert("payment failed!"); console.log(result);
          // window.location.href='/voucher'
          send_response_to_form(result);


        },
        onClose: function(){
          /* You may add your own implementation here */
          
          alert('you closed the popup without finishing the payment');
          window.location.href='/voucher'


        }
      })
    });
    function send_response_to_form(result){
        document.getElementById('json_callback').value = JSON.stringify(result);
        $('#submit_form').submit();
      }
  </script>
@endsection
@endsection