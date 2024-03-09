@extends('layouts.app-normal')

@section('title', 'Show Category')
@section('user', auth()->guard('organizer')->user()->name)

@section('content')
    <div class="container   p-14 dark:bg-gray-800 dark:text-white">
        <div class="flex items-center justify-between">
            <h1 class="text-2xl font-bold mb-4">Detail Event</h1>
            <a href="{{ route('events.index') }}" class="block px-8 rounded bg-blue-600 text-white py-2">Back</a>
        </div>
        <hr class="border-b border-gray-300 mb-8">

        <div class="grid grid-cols-1 ">
            <div class="flex flex-col items-center text-left space-y-4 md:space-y-6">
                <img src="{{asset('storage/' . $event['poster_image'])}}" alt="Event Poster" class="mt-4 max-w-40 md:max-w-60">
                {{-- Display event details --}}
                <h1 class="text-3xl font-bold mb-4 text-gray-800">{{ $event['title'] }}</h1>
                <p class="text-gray-100">Date: <span class="font-semibold">{{ $event['date'] }}</span></p>
                <p class="text-gray-100">Description: <span class="font-semibold">{{ $event['description'] }}</span></p>
                <p class="text-gray-100">Address: <span class="font-semibold">{{ $event['Address'] }}</span></p>
                <p class="text-gray-100">Available Seats: <span class="font-semibold">{{ $event['available_seats'] }}/{{ $event['seats'] }}</span></p>
                <p class="text-gray-100">Seat Price: <span class="font-semibold">{{ $event['seat_price'] ?? 'Free' }}</span></p>
                <p class="text-gray-100">Status: <span class="font-semibold">{{ $event['status'] }}</span></p>
            </div>

        </div>
    </div>
@endsection
