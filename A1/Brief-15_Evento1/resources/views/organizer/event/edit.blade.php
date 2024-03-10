@extends('layouts.organizer-dashboard')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <a href="{{route('event.index')}}" class="text-lg bg-gray-900 text-white px-4 py-2 rounded m-6 font-semibold mb-1">Back to Events</a>
    </div>
    <!-- Form -->
    <x-event-card :event="$event" :categories="$categories" :route="'event.update'" :id="$event->id" :method="'put'" />
@endsection
