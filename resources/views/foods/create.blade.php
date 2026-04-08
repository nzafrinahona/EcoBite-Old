@extends('layouts.app')
@section('title', 'Add Food')
@section('content')

<h1 class="text-3xl font-bold mb-6">Add New Food</h1>

<form action="{{ route('foods.store') }}" method="POST" class="max-w-lg bg-white p-6 rounded shadow-md">
    @csrf
    <label class="block mb-2 font-semibold">Title</label>
    <input type="text" name="title" value="{{ old('title') }}" 
           class="border rounded px-3 py-2 w-full mb-4">

    <label class="block mb-2 font-semibold">Description</label>
    <textarea name="description" class="border rounded px-3 py-2 w-full mb-4">{{ old('description') }}</textarea>

    <label class="block mb-2 font-semibold">Price</label>
    <input type="number" name="price" step="0.01" value="{{ old('price') }}" 
           class="border rounded px-3 py-2 w-full mb-4">

    <label class="block mb-2 font-semibold">Quantity</label>
    <input type="number" name="quantity" value="{{ old('quantity') }}" 
           class="border rounded px-3 py-2 w-full mb-4">

    <label class="block mb-2 font-semibold">Expiry Time</label>
    <input type="datetime-local" name="expiry_time" value="{{ old('expiry_time') }}" 
           class="border rounded px-3 py-2 w-full mb-4">

    <label class="block mb-2 font-semibold">Cafeteria Name</label>
    <input type="text" name="cafeteria_name" value="{{ old('cafeteria_name') }}" 
           class="border rounded px-3 py-2 w-full mb-4">

    <button type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
        Add Food
    </button>
</form>

@endsection