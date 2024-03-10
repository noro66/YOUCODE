@extends('layouts.organizer-dashboard')

@section('content')
    <section class="flex flex-col sm:flex-row h-screen">
        <div class="w-full sm:w-4/4  bg-gray-600 p-4">
            <a href="{{route('event.create')}}" class="block w-32 cursor-pointer  bg-gray-900 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md mb-4">
                Add Event
            </a>
            <!-- Event cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 ">
                @foreach ($events as $event)
                    <div class="bg-white border  border-gray-200 flex flex-col items-center pt-2   rounded-lg shadow">
                        <a href="{{route('event.show', $event->id)}}" title="Show the Event"><img  class="h-32 w-full" src="{{ asset('storage/' . $event->poster_image) }}">
                        </a>
                        <hr class="text-black">
                        <div class="p-4">
                            <h2 class="text-gray-700 mb-1"><span class="font-bold text-black">Title</span> {{ $event->title }}</h2>
                            <p class="text-gray-700 mb-1"><span class="font-bold text-black">Date :</span> {{ Carbon\Carbon::parse($event->date)->format('D-M-Y H:i')}}</p>
                            <p class="text-gray-600"> <span class="font-bold text-black">Description : </span> {{ \Illuminate\Support\Str::limit($event->description , 15)}}</p>
                        </div>
                        <div class="flex items-center justify-around px-2 w-full ">
                            @can('delete', $event)
                                <a href="{{route('event.edit', $event->id)}}" class="block w-24 cursor-pointer  bg-gray-900 hover:bg-gray-700 text-white font-semibold py-2 px-4 rounded-md mb-4">
                                    Update
                                </a>
                            @endcan
                            @can('delete', $event)
                                <form action="{{route('event.destroy', $event->id)}}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="block w-24 cursor-pointer  bg-red-900 hover:bg-red-700 text-white font-semibold py-2 px-4 rounded-md mb-4">Delete</button>
                                </form>
                            @else
                                <button class="block w-24 cursor-pointer  bg-green-900 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-md mb-4" disabled>Aprroved</button>
                            @endcan
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="fixed right-4 bottom-4">
                {{ $events->links() }}
            </div>
        </div>
    </section>
@endsection
