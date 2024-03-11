@extends('layouts.app')
@section('title', 'Category')
@section('content')
    <h3 class="my-10 text-center text-3xl text-gray-900">Edit  Category</h3>
    <div class="w-lg flex flex-col items-center justify-center">
        <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Category Name:</label>
                <input type="text" id="name" name="name" placeholder="Category Name" value="{{$category->name  ?? old('name')  }}" class="mt-1 px-6 py-2 block w-full rounded-md border border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                @error('name') <span class="text-red-500">{{ $message }}</span> @enderror
            </div>
            <button type="submit" class="w-full py-2 px-4 bg-indigo-600 hover:bg-indigo-700 text-white rounded-md focus:outline-none focus:ring focus:ring-indigo-200 focus:ring-opacity-50">Submit</button>
        </form>
    </div>
@endsection
