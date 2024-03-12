@extends('layouts.admin-dashboard')

@section('content')
    <div class="max-w-xl mx-auto px-4 py-8">
        <a href="{{ route('category.create') }}" class="block bg-gray-900  hover:bg-gray-700  text-white font-semibold py-2 px-4 rounded-md text-center mb-4">
            Approve Event
        </a>

        @if($events->count())
            @foreach($events as $event)
                <div class="bg-gray-300 text-gray-800 shadow rounded-md p-4 mb-4">
                    <h3 class="text-xl font-semibold mb-2">Event Title: <span class="underline"><a href="{{route('event.show', $event->id)}}">{{ $event->title }}</a></span></h3>
                    <div class="flex items-center">
                        <form action="{{ route('event.approve', $event->id) }}" method="POST">
                            @csrf
                            <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-4 rounded-md">Approve</button>
                        </form>
                    </div>
                </div>
            @endforeach
{{--            {{$events->links()}}--}}
        @else
            <p class="bg-gray-100 text-xl text-center py-2 rounded-md">There are no Events to Approve</p>
        @endif
    </div>
@endsection
