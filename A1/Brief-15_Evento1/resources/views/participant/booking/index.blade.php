@extends('layouts.participant-dashboard')

@section('content')
    <section class="flex flex-col sm:flex-row h-screen">
        <div class="w-full sm:w-4/4 bg-gray-600 p-6">
            <!-- Event cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($bookings as $booking)
                    <div class="max-w-lg w-full rounded-lg shadow-lg overflow-hidden bg-white">
                        <div class="px-3 py-2">
                            <div class="font-bold text-xl mb-2 text-gray-800">Reservation Details</div>
                            <div class="text-gray-600">
                                <p class="mb-2"><span class="font-semibold">Event:</span> <a href="{{route('event.show',$booking->event->id)}}">{{ $booking->event->title }}</a> </p>
                                <p class="mb-2"><span class="font-semibold">Date:</span> {{ Carbon\Carbon::parse($booking->event->date)->format('d M Y H:i') }}</p>
                                <p class="mb-2"><span class="font-semibold">Location:</span> {{ $booking->event->Address }}</p>
                                <p class="mb-2"><span class="font-semibold">Organizer:</span> {{ $booking->event->organizers->user->name }}</p>
                            </div>
                        </div>
                        @can('canselReservation', $booking->event)
                            <div class="w-full p-4">
                                <form action="{{ route('event.booking', $booking->event->id) }}" method="post" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to cancel this Booking?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                                        Cancel Reservation
                                    </button>
                                </form>
                            </div>
                        @endcan
                    </div>
                @endforeach
            </div>
            <!-- Pagination -->
            <div class="mt-6">
                {{ $bookings->links() }}
            </div>
        </div>
    </section>
@endsection
