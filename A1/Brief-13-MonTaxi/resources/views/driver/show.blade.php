@extends('base')
@section('title', 'Create Driver')
@section('content')

    <x-nav-bar />
    <div class="container mx-auto">
        <div class="flex justify-center">
            <div class="max-w-lg border border-gray-300 p-6 rounded-md shadow-md">
                <img src="{{ asset('storage/' . $driver->avatar) }}" class="w-24 h-24 rounded-full mx-auto" alt="Driver Avatar">
                <h1 class="text-2xl font-semibold text-center mt-4">{{ $driver->name }}</h1>
                <p class="text-gray-600 text-center">{{ $driver->description }}</p>
                <ul class="mt-4">
                    <li><strong>Phone:</strong> {{ $driver->phone }}</li>
                    <li><strong>Matriculate:</strong> {{ $driver->matriculate }}</li>
                    <li><strong>Vehicle Type:</strong> {{ $driver->v_type }}</li>
                </ul>
            </div>
        </div>
    </div>

{{--    <x-footer/>--}}
@endsection
