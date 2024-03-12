@extends('layouts.participant-dashboard')

@section('content')
    <div class="w-full bg-gray-600 p-6">
        <h1 class="text-3xl text-white mb-6">Reservation Details</h1>
        <!-- Event cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($bookings as $booking)
                <div class="max-w-lg w-full rounded-lg shadow-lg overflow-hidden bg-white">
                    <div class="px-3 py-2">
                        <div class="font-bold text-xl mb-2 text-gray-800">Event Details</div>
                        <div class="text-gray-600">
                            <p class="mb-2"><span class="font-semibold">Event:</span> <a href="{{ route('event.show', $booking->event->id) }}">{{ $booking->event->title }}</a></p>
                            <p class="mb-2"><span class="font-semibold">Date:</span> {{ Carbon\Carbon::parse($booking->event->date)->format('d M Y H:i') }}</p>
                            <p class="mb-2"><span class="font-semibold">Location:</span> {{ $booking->event->Address }}</p>
                            <p class="mb-2"><span class="font-semibold">Organizer:</span> {{ $booking->event->organizer->user->name }}</p>
                            @if(!$booking->is_approved)
                                <div class="mb-2 bg-gray-200 px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full inline-flex items-center space-x-2">
                                    <span>Status: Pending</span>
                                </div>
                            @else
                                <div class="mb-2 bg-green-200 px-4 py-2 shadow-sm tracking-wider border text-gray-600 rounded-full inline-flex items-center space-x-2">
                                    <span>Status: Accepted</span>
                                </div>
                            @endif
                        </div>
                    </div>
                    @can('canselReservation', $booking->event)
                        <div id="popup-{{ $booking->id }}" class="fixed top-0 left-0 w-full h-full flex justify-center items-center bg-black bg-opacity-50 hidden">
                            <div class="bg-white rounded-lg p-8 max-w-md">
                                <div class="ticket">
                                    <div class="ticket-header">
                                        <h1 class="text-xl font-bold">Event Title : {{ $booking->event->title }}</h1>
                                    </div>
                                    <div class="ticket-info">
                                        <h2 class="text-sm">Date: {{ Carbon\Carbon::parse($booking->event->date)->format('d M Y H:i') }}</h2>
                                        <h2 class="text-sm">Location: {{ $booking->event->Address }}</h2>
                                    </div>
                                    <div class="barcode mt-4">
                                        <img src="https://barcode.tec-it.com/barcode.ashx?data=ABC-1234" alt="Barcode" class="mx-auto" />
                                    </div>
                                    <div class="footer mt-4">
                                        <p class="text-xs text-gray-600">Thank you for your purchase, Mr.{{ $booking->participant->user->name }}!</p>
                                    </div>
                                    <div class="flex justify-center mt-4">
                                        <button onclick="hidePopup('popup-{{ $booking->id }}')" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-2">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center justify-center">
                            <div class="w-full p-2 mr-1">
                                <form action="{{ route('event.booking', $booking->event->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('Are you sure you want to cancel this Booking?')" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Cancel</button>
                                </form>
                            </div>
                            @if($booking->is_approved)
                                <div class="w-full p-2">
                                    <button onclick="showPopup('popup-{{ $booking->id }}')" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Ticket</button>
                                </div>
                            @endif
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
    <script>
        function showPopup(id) {
            document.getElementById(id).classList.remove("hidden");
        }

        function hidePopup(id) {
            document.getElementById(id).classList.add("hidden");
        }
    </script>
@endsection
