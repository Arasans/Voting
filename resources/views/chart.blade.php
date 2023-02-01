@extends('layouts.main')
@section('section')


<section id="Chart" class="pt-28">
    <div>
        @foreach ($finalis as $item)
            
        <div class="container lg:w-4/12 md:w-4/6 w-4/5 my-10">
            @if ($item['votings']==0)
                        
            <div class="flex flex-row justify-between">
                <div>
                    <h2 class="text-white text-lg">{{ $item['name'] }}</h2>
                </div>
                <div>
                    <h2 class="text-white text-lg">0%</h2>
                </div>
            </div>
            <div class="w-full h-9 bg-slate-100 rounded-md shadow-md">
                <div class="bg-button h-9 rounded-md" style="width:0%"></div>
            </div>
            @else
            <div class="flex flex-row justify-between">
                <div>
                    <h2 class="text-white text-lg">{{ $item['name'] }}</h2>
                </div>
                <div>
                    <h2 class="text-white text-lg">{{ number_format($item['votings']/$sum*100,2) }}%</h2>
                </div>
            </div>
            <div class="w-full h-9 bg-slate-100 rounded-md shadow-md">
                <div class="bg-button h-9 rounded-md" style="width:{{ $item['votings']/$sum*100 }}%"></div>
            </div>
                
            @endif
        </div>
        @endforeach
    </div>
</section>

@endsection