@extends('layouts.main')
@section('section')
{{-- Hero Start --}}


<section id="home" class=" h-screen flex flex-wrap  items-center w-full justify-center">
    <div class="">
        <div class="flex flex-wrap xl:mx-auto">
            <div class="lg:pr-52 pr-0 lg:w-1/2">
                <div class=" w-full">
                    <img
                    src="{{asset('img/Logo.png')}}"
                    alt="LOGO"
                    class="relative z-10"
                    width="701"
                    height="316"
                    
                    />
                </div>
        </div>
        <div class="px-0 lg:pl-52   w-full self-center pt-5 lg:pt-0 lg:w-1/2">
            <h2 class="text-4xl  xl:text-5xl pt-3 pb-2 text-white">Be a part of decision</h2>
            <h1 class="text-7xl  xl:text-8xl text-button ">Vote Today</h1>
            <div class="xl:flex xl:flex-wrap xl:justify-center mr-32 mt-11">
                <button type="submit" class="">
                    <a href="/finalis" type="submit" class=" bg-button py-2 px-10 font-medium text-white rounded-lg shadow-md transition ease-in-out hover:bg-secondary hover:text-button focus:bg-secondary focus:bg-opacity-25 focus:text-button  duration-500  ">Lets Vote</a>
                </button>
            </div>
        </div>
    </div>
</section>

{{-- Hero End --}}


@endsection