@extends('layouts.app')
@section('title', 'Food Listings')
@section('content')

<h1 class="text-3xl font-bold mb-6">Available Foods</h1>

<div class="flex flex-wrap justify-start -m-4">
    @foreach($foods as $food)
    <div class="max-w-sm rounded overflow-hidden shadow-lg m-4 bg-white">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">{{ $food->title }}</div>
            <p class="text-gray-700 text-base">{{ $food->description }}</p>
            <p class="mt-2 text-green-600 font-semibold">Price: ${{ $food->price }}</p>
            <p class="text-gray-600">Quantity: {{ $food->quantity }}</p>
            <p class="text-gray-600">Expiry: {{ $food->expiry_time }}</p>
            <p class="text-gray-600">Cafeteria: {{ $food->cafeteria_name }}</p>
        </div>
        <div class="px-6 pt-4 pb-4 flex space-x-2">
            <a href="{{ route('foods.edit', $food->id) }}"
               class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit</a>
            <form action="{{ route('foods.destroy', $food->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @endforeach
</div>

@endsection