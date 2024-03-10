@extends('layouts.app')

@section('title', 'Show Event')

@section('content')
    <section class="pt-24 bg-gray-100 py-12">
        <div class="container mx-auto px-4">
            <div class="max-w-lg mx-auto bg-white rounded-lg overflow-hidden shadow-lg">
                <img src="{{ asset('storage/' . $event->poster_image) }}" alt="Event Image" class="w-full h-48 object-cover">
                <div class="p-6">
                    <h1 class="text-2xl font-bold mb-2">{{ $event->title }}</h1>
                    <p class="mb-4 text-gray-600">{{ $event->description }}</p>
                    <div class="flex items-center mb-2">
                        <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>{{ Carbon\Carbon::parse($event->date)->format('d M Y') }}</span>
                    </div>
                    <div class="flex items-center mb-2">
                        <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path d="M3 21v-2a4 4 0 014-4h10a4 4 0 014 4v2m-3-10a4 4 0 11-8 0 4 4 0 018 0zM3 7h18M4 11v-6a1 1 0 011-1h14a1 1 0 011 1v6m-5 4h3"></path>
                        </svg>
                        <span>{{ $event->Address }}</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>{{ $event->category->name  }}</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        <span>{{ $event->available_seats }} / {{ $event->seats }} seats available</span>
                    </div>
                    <div class="flex items-center mb-4">
                        <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>{{ $event->seat_price ?? 'Free' }}</span>
                    </div>
                    @can('view', $event)
                    <div class="flex items-center mb-4">
                        <svg class="h-6 w-6 text-gray-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        <span>{{ ucfirst($event->status) }}</span>
                    </div>
                    @endcan
                    @can('reserve', $event)
                    <form action="#" method="POST">
                        @csrf
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Reserve Now
                        </button>
                    </form>
                    @endcan
                </div>
            </div>
        </div>
    </section>
@endsection
