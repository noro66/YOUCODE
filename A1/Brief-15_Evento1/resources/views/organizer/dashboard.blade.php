@extends('layouts.organizer-dashboard')

@section('content')
    @section('title') Dashboard @endsection
    <div class="flex flex-wrap justify-around gap-y-2 gap-x-1  p-10 ">
        <div class="w-1/3 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $trashed_events }}</span>
            <h1 class="text-xl font-semibold">Trashed Events</h1>
        </div>
        <div class="w-1/3 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $not_trashed_events }}</span>
            <h1 class="text-xl font-semibold">Non-Trashed Events</h1>
        </div>
        <div class="w-1/3 bg-gray-300 text-gray-800 p-4 border-2 border-gray-800 text-center">
            <span class="text-3xl font-semibold">{{ $total_events }}</span>
            <h1 class="text-xl font-semibold">Total Events</h1>
        </div>
    </div>
@endsection
