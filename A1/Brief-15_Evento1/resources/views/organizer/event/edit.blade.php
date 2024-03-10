@extends('layouts.organizer-dashboard')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-lg font-semibold mb-1">Add Event</h2>
    </div>
    <!-- Form -->
    <x-event-card :event="$event" :categories="$categories" :route="'event.update'" :id="$event->id" :method="'put'" />
@endsection
