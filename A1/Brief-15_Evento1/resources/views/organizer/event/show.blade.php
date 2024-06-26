@extends('layouts.app')
@section('title', 'show Event')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-3xl mx-auto bg-white shadow-md rounded-lg overflow-hidden">
            <!-- Event details -->
            <div class="p-6">
                <img src="{{asset('storage/'.  $event->poster_image )}}" alt="Event Poster" class="mt-4 rounded-lg">
                <h2 class="text-xl font-semibold text-gray-800 mt-1"> <spna class="text-3xl" >Title : </spna>{{ $event->title }}</h2>
                <p class="text-gray-600 mt-1 "><span class="font-semibold">Date: </span> {{ \Illuminate\Support\Carbon::parse($event->date)->format('D-M-Y H:i') }} </p>
                <p class="text-gray-600 mt-1"><span class="font-semibold">Location:</span> {{ $event->Address }}</p>
                <p class="text-gray-600 mt-1 "><span class="font-semibold" >Description : </span>{{ $event->description }}</p>
                <p class="text-gray-600 mt-1 "><span class="font-semibold" >Available Seats : </span>{{ $event->available_seats . '/'.  $event->seats }}</p>
                <p class="text-gray-600 mt-1 "><span class="font-semibold" >Seat Price : </span>{{ $event->seat_price ?? 'Free' }}</p>
                <p class="text-gray-600 mt-1 "><span class="font-semibold" >Creation Date : </span>{{ $event->created_at->diffForHumans() }}</p>
                @can('view', $event)
                <p class="text-gray-600 mt-1 "><span class="font-semibold" >Confirmation Type : </span>{{ $event->confirmation_type }}</p>
                <p class="text-gray-600 mt-1 "><span class="font-semibold" >Last Update : </span>{{ $event->updated_at->diffForHumans() }}</p>
                @endcan
            </div>
            <!-- Organizer details -->
            <div class="p-6 border-t border-gray-200">
                <h2 class="text-xl font-semibold text-gray-800">Organizer Details</h2>
                <p class="text-gray-600 mt-2"><span class="font-semibold">Name:</span> {{ $event->organizer->user->name }}</p>
                <p class="text-gray-600"><span class="font-semibold">Email:</span> {{ $event->organizer->user->email }}</p>
            </div>
            <!-- Participants awaiting approval -->
            @can('view', $event)
                <div class="p-6 border-t border-gray-200">
                    <h2 class="text-xl font-semibold text-gray-800">Participants Awaiting Approval:</h2>
                    @if($pendingBookings->count())
                        <ul class="mt-2">
                            @foreach ($pendingBookings as $pendingBooking)
                                <li class="flex items-center justify-between text-gray-600">
                                    <span>{{ $pendingBooking->participant->user->name }}</span>
                                    <form action="{{ route('booking.approve', $pendingBooking->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="ml-2 px-3 py-1 text-sm bg-green-500 text-white font-semibold rounded hover:bg-green-600 focus:outline-none focus:bg-green-600">Approve</button>
                                    </form>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <h3 class="text-center mt-4 text-amber-200">There are no pending bookings for this event.</h3>
                    @endif
                </div>

            @endcan
        </div>
    </div>
@endsection
