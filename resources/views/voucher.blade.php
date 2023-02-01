@extends('layouts.main')
@section('section')

@section('css')
     <!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
     <script type="text/javascript"
     src="https://app.sandbox.midtrans.com/snap/snap.js"
     data-client-key="{{ config('midtrans.client_key') }}"></script>
   <!-- Note: replace with src="https://app.midtrans.com/snap/snap.js" for Production environment -->
@endsection

<section id="Input" class="h-screen flex flex-wrap  items-center justify-center">
  
    <div class="container lg:w-4/12 md:w-4/6 w-4/5">

        <form class="w-full" action='/voucher' method="POST">       
            @csrf 
                   
            <div class="mb-10">
                <label
                  for="nama"
                  class="mb-2 block text-lg font-medium text-gray-900"
                  >Nama</label>
                <input
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
                  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"
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
                      <input required autocomplete="off" class="shadow-sm block w-full rounded-lg border  bg-gray-50 p-2.5 text-gray-900 focus:border-primary focus:bg-white focus:text-gray-700 focus:outline-none sm:text-sm" id="currency-input" type="text" name="jumlah" placeholder="Harga" oninput="checkNumber(event)">
                  </div>
            </div>
            <div class="justify-center w-full flex flex-wrap">

                <button type="submit" class=" bg-button py-2 px-10 font-medium text-white rounded-lg shadow-md transition ease-in-out hover:bg-secondary hover:text-button focus:bg-secondary focus:bg-opacity-25 focus:text-button  duration-500  ">
                    Selesai
                </button>
            </div>

            
        </form>
        
    </div>
</section>

@section('java')
{{-- <script type="text/javascript">
window.onload=function(){
  console.log("CEK",{{ $check }})
  // For example trigger on button clicked, or any time you need
  // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
  if ({{ $check }}==true) {
    window.snap.pay('{{ $snapToken }}', {
      onSuccess: function(result){
        /* You may add your own implementation here */
        alert("payment success!"); console.log(result);
      },
      onPending: function(result){
        /* You may add your own implementation here */
        alert("wating your payment!"); console.log(result);

      },
      onError: function(result){
        /* You may add your own implementation here */
        alert("payment failed!"); console.log(result);
      },

      onClose: function(){
        /* You may add your own implementation here */
        alert('you closed the popup without finishing the payment');

      }
    })

    } else {
      return 0; 
    }
  }
  // var payButton = document.getElementById('pay-button');
  // payButton.addEventListener('click', function () {
  // });
</script> --}}
{{-- <script type="text/javascript">
  // For example trigger on button clicked, or any time you need
  var payButton = document.getElementById('pay-button');
  payButton.addEventListener('click', function () {
    // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
    window.snap.pay('{{$snap_token}}');
    // customer will be redirected after completing payment pop-up
  });
</script> --}}

<script>
function checkNumber(event) {
    var input = event.target.value;
    if (input % 10000 !== 0||input==0) {
      event.target.setCustomValidity("Min 10.000 dan Kelipatannya");
    } else {
      event.target.setCustomValidity("");
    }
    
  }
</script>
<script>
        const input = document.getElementById("currency-input");
        input.addEventListener("focus", function(e) {
            this.value = formatCurrency(this.value);
            console.log("INI FOKUC");
    
        });
        input.addEventListener("blur", function(e) {
            this.value = formatCurrency(this.value);
            console.log("INI BLUR");
        });
        input.addEventListener("keydown", function(e) {
            console.log("INI KEYDOWN");
    
            if (e.keyCode === 188 || e.keyCode === 190) {
                e.preventDefault();
                console.log("INI IF KEYDOWN");
    
            }
        });
    
        function formatCurrency(value) {
            
                
            value = (value.replace(/[^\d.]/g, ""));
            return value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
        }
    
    
</script>
@endsection
@endsection