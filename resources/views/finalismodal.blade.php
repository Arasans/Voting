@extends('layouts.main')
@section('section')
{{-- <div class="fixed top-0 left-0 h-screen w-screen z-50 flex items-center justify-center bg-black opacity-75">
    <div class="bg-white p-6 rounded-lg">
      <!-- Modal content goes here -->
      <button class="absolute top-0 right-0 p-2 text-gray-500 hover:text-white">
        <svg class="fill-current h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <title>Close</title>
          <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z" />
        </svg>
      </button>
    </div>
  </div> --}}
<section id="Card" class="pt-32">
    <div class="container flex flex-wrap justify-center">
        <div class="flex flex-wrap justify-center ">
            @foreach ($finalis as $item)
                
            <div class="shadow-lg sm:mx-5 mt-10">
    
                <div class="w-72 h-64 bg-primary rounded-lg">
                    <div class="h-full w-full rounded-t-lg">
                        <img src={{ asset('img/finalis/'.$item['image']) }} alt="" class="bg-cover items-center justify-center w-full  h-full rounded-t-lg">
                    </div>  
                </div>
                <div class="w-full justify-center">
                    <h1 class="text-center text-white text-lg bg-primary">{{ $item['name'] }}</h1>
                </div>
                <div class="w-full h-12">
                    <form action="" method="POST"></form>
                    <button type="submit" class="text-center text-white text-lg w-full h-12 bg-button rounded-b-lg flex flex-wrap justify-center items-center transition ease-in-out hover:bg-secondary hover:text-button focus:bg-secondary focus:bg-opacity-25 focus:text-button  duration-500">
                        VOTE
                    </button>
                </div>
            </div>
            @endforeach 
        </div>
    </div>
</section>
<section  class="flex fixed top-0 left-0 right-0 bottom-0 min-h-full w-full z-50 items-center justify-center bg-black bg-opacity-80  px-5">
    <div class="md:w-2/5 w-full  h-64 bg-white p-5">
        <div class="flex flex-wrap flex-row w-full justify-between border-b-2 pb-3">
            <h1 class="text-lg font-medium">Masukkan Kode Voucher</h1>
            <a href="">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6 ">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 011.06 0L12 10.94l5.47-5.47a.75.75 0 111.06 1.06L13.06 12l5.47 5.47a.75.75 0 11-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 01-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 010-1.06z" clip-rule="evenodd" />
                </svg>
            </a>
        </div>
        <form action="/kode" method="POST">
            @csrf
            <div class="py-3 border-b-2">
                <div class="mb-3">
                    <label
                      for="voucher"
                      class="mb-2 block text-lg font-medium text-gray-900"
                      >Voucher</label>
                    <input
                      type="voucher"
                      name="voucher"
                      required
                      placeholder="Voucher"
                      id="voucher"
                      class="shadow-sm block w-full rounded-lg border  bg-gray-50 p-2.5 text-gray-900 focus:border-primary focus:bg-white focus:text-gray-700 focus:outline-none sm:text-sm"
                    />
                </div>
            </div>
            <div class="justify-end w-full flex flex-wrap mt-4">
                <input value="{{ $id }}" type="hidden" name="json" id="json_callback">

                <button type="submit" class=" bg-button py-2 px-10 font-medium text-white rounded-lg shadow-md transition ease-in-out hover:bg-secondary hover:text-button focus:bg-secondary focus:bg-opacity-25 focus:text-button  duration-500  ">
                    Selesai
                </button>
            </div>
        </form>
    </div>
</section>



@endsection