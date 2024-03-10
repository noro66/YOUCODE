@extends('layouts.organizer-dashboard')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-8">
        <a href="{{ route('event.create') }}" class="block bg-gray-900  hover:bg-gray-700  text-white font-semibold py-2 px-4 rounded-md text-center mb-4">
            Create Event
        </a>

        @if($events->count())
            @foreach($events as $event)
                <div class="bg-white shadow rounded-md p-4 mb-4">
                    <h3 class="text-xl font-semibold mb-2">Category Name: <span class="underline">{{ $event->name }}</span></h3>
                    <div class="flex justify-between items-center">
                        <form action="{{ route('event.destroy', $event->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-4 rounded-md">Delete</button>
                        </form>
                        <a href="{{ route('event.edit', $event->id) }}" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-1 px-4 rounded-md">Edit</a>
                    </div>
                </div>
            @endforeach
            {{$events->links()}}
        @else
            <p class="bg-gray-100 text-xl text-center py-2 rounded-md">There are no events</p>
        @endif
    </div>
@endsection
