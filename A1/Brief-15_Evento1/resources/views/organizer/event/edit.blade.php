@extends('layouts.organizer-dashboard')

@section('content')
    <div class="max-w-lg mx-auto">
        <div class="flex items-center justify-between mb-8">
            <h1 class="text-2xl font-bold">Edit Category</h1>
            <a href="{{ route('event.index') }}" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Back</a>
        </div>

        <form action="{{ route('event.store') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Category Name:</label>
                <input type="text" id="name" name="name" placeholder="Category Name" value="{{ $category->name ??  old('name') }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded focus:outline-none focus:shadow-outline">Submit</button>
        </form>
    </div>
@endsection
