@extends('layouts.organizer-dashboard')

@section('content')
    <div class="flex items-center justify-between mb-8">
        <h2 class="text-lg font-semibold mb-1">Add Event</h2>
    </div>
    <!-- Form -->
    <x-event-card :categories="$categories" :event="null" :route="'event.store'" :method="'post'" />
@endsection
