@extends('layouts.app')

@section('content')
<div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-end border-b-4 border-black pb-8 gap-4">
    <div>
        <h1 class="text-6xl font-black text-black tracking-tighter mb-2 uppercase">YOUR CART</h1>
        <p class="text-gray-500 font-bold uppercase text-xs tracking-[0.2em]">Check your reservations before confirmation.</p>
    </div>
</div>

@if(empty($items))
    <div class="border-8 border-dashed border-black p-24 text-center bg-gray-50">
        <h3 class="text-2xl font-black text-black uppercase tracking-widest italic">CART EMPTY!</h3>
        <p class="mt-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Go to the <a href="{{ route('student-feed') }}" class="underline decoration-4">Feed</a> to find food.</p>
    </div>
@else
    <div class="grid grid-cols-1 gap-6 mb-10">
        @foreach($items as $item)
            <div class="border-4 border-black bg-white p-6 flex justify-between items-center shadow-[6px_6px_0_#000]">
                <div class="flex items-center gap-6">
                    <div class="w-16 h-16 bg-gray-100 border-2 border-black flex items-center justify-center">
                        @if($item->photo)
                            <img src="{{ asset('storage/' . $item->photo) }}" class="w-full h-full object-cover">
                        @else
                            <span class="text-2xl">🍱</span>
                        @endif
                    </div>
                    <div>
                        <h4 class="font-black text-black uppercase tracking-tighter text-xl">{{ $item->title }}</h4>
                        <p class="text-[10px] font-black uppercase text-gray-400 tracking-widest">Qty: {{ $item->qty }} x ৳{{ number_format($item->discounted_price, 2) }}</p>
                    </div>
                </div>
                <div class="font-black text-2xl text-black tracking-tighter">
                    ৳{{ number_format($item->discounted_price * $item->qty, 2) }}
                </div>
            </div>
        @endforeach
    </div>

    <div class="flex flex-col md:flex-row justify-between items-center bg-black text-white p-10 border-4 border-black shadow-[10px_10px_0_#999]">
        <div>
            <span class="text-[10px] font-black uppercase tracking-[0.3em] text-gray-400 block mb-1">Total Savings Value:</span>
            <h2 class="text-5xl font-black tracking-tighter">৳{{ number_format($total, 2) }}</h2>
        </div>
        
        <form action="{{ route('reservations.confirm') }}" method="POST">
            @csrf
            <button class="bg-white text-black px-12 py-6 rounded-none font-black text-sm uppercase tracking-[0.3em] border-4 border-white hover:bg-black hover:text-white transition-all active:translate-x-1 active:translate-y-1 active:shadow-none">
                CONFIRM RESERVATION
            </button>
        </form>
    </div>
@endif
@endsection
