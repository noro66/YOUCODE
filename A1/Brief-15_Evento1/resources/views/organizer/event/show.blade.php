@extends('layouts.app')

@section('title', 'Show Event')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex  items-center justify-between">
            <h1 class="text-2xl font-bold mb-4">Detail Event</h1>
            <a href="{{route('event.index')}}" class=" block  px-8 rounded bg-blue-600 text-white py-2 s" >Back</a>
        </div>
        <hr class="border-b border-gray-300 mb-8">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-4 gap-y-6">
            <div>
                <label class="block text-sm font-medium text-gray-700">Name: </label>
                <div class="mt-2">{{ $category->title }}</div>
            </div>
        </div>
    </div>
@endsection
