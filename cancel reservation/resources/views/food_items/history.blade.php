@extends('layouts.app')

@section('content')
<div class="mb-10 flex flex-col md:flex-row justify-between items-start md:items-end border-b-4 border-black pb-8 gap-4">
    <div>
        <h1 class="text-6xl font-black text-black tracking-tighter mb-2 uppercase">RESERVATIONS</h1>
        <p class="text-gray-500 font-bold uppercase text-xs tracking-[0.2em]">Track your active and past surplus pickups.</p>
    </div>
</div>

@if($reservations->isEmpty())
    <div class="border-8 border-dashed border-black p-24 text-center bg-gray-50">
        <h3 class="text-2xl font-black text-black uppercase tracking-widest italic">NO RESERVATIONS</h3>
        <p class="mt-4 text-xs font-bold text-gray-400 uppercase tracking-widest">Everything you reserve will show up here.</p>
    </div>
@else
    <div class="space-y-8">
        @foreach($reservations as $res)
            <div class="border-4 border-black bg-white group shadow-[10px_10px_0_#000] overflow-hidden">
                <div class="flex flex-col md:flex-row">
                    {{-- Status Indicator --}}
                    <div class="md:w-16 flex items-center justify-center p-4 border-b-4 md:border-b-0 md:border-r-4 border-black {{ $res->status == 'cancelled' ? 'bg-gray-200' : 'bg-black' }}">
                        <div class="transform -rotate-90 text-[10px] font-black uppercase tracking-[0.5em] {{ $res->status == 'cancelled' ? 'text-black' : 'text-white' }} whitespace-nowrap">
                            {{ $res->status }}
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="flex-grow p-8 flex flex-col md:flex-row justify-between items-center gap-6">
                        <div class="flex gap-6 items-center">
                            <div class="w-20 h-20 bg-gray-100 border-2 border-black flex items-center justify-center shrink-0">
                                @if($res->foodItem->photo)
                                    <img src="{{ asset('storage/' . $res->foodItem->photo) }}" class="w-full h-full object-cover">
                                @else
                                    <span class="text-3xl">🍱</span>
                                @endif
                            </div>
                            <div>
                                <h3 class="text-2xl font-black text-black uppercase tracking-tighter">{{ $res->foodItem->title }}</h3>
                                <p class="text-gray-400 text-[10px] font-black uppercase tracking-widest mt-1">Quantity: {{ $res->quantity }} | Reserved on: {{ $res->created_at->format('M d, Y') }}</p>
                            </div>
                        </div>

                        <div class="flex flex-col items-center md:items-end gap-2">
                             <span class="text-[10px] font-black uppercase tracking-[0.2em] text-gray-400">PICKUP CODE:</span>
                             <div class="bg-gray-100 border-2 border-black border-dashed px-6 py-3 font-mono font-black text-2xl tracking-widest text-black">
                                {{ $res->pickup_code }}
                             </div>
                        </div>

                        <div class="flex gap-4">
                            @if($res->status == 'confirmed')
                                <form action="{{ route('reservations.cancel', $res->id) }}" method="POST" onsubmit="return confirm('Restore stock and cancel reservation?')">
                                    @csrf
                                    <button class="bg-white text-black px-6 py-4 border-4 border-black font-black text-[10px] uppercase tracking-widest hover:bg-black hover:text-white transition-all shadow-[4px_4px_0_#999] active:translate-x-1 active:translate-y-1 active:shadow-none">
                                        CANCEL
                                    </button>
                                </form>
                            @else
                                <button disabled class="bg-gray-100 text-gray-400 px-6 py-4 border-4 border-gray-300 font-black text-[10px] uppercase tracking-widest cursor-not-allowed italic">
                                    {{ strtoupper($res->status) }}
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
@endsection
