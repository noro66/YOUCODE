<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Event;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * @throws AuthorizationException
     */

    public  function index()
    {
        $bookings = Auth::user()->participant->booking()->paginate(4);
        return view('participant.booking.index', compact('bookings'));

    }
    public function store(Event $event)
    {
        $this->authorize('reserve', $event);
        $bookingForm['booked_by'] = Auth::user()->participant->id;
        $booking = $event->booking()->create($bookingForm);
        if ($event->confirmation_type === 'automatic'){
            $event->available_seats -= 1;
            $event->update();
            $booking->is_approved = true;
            $booking->update();
        }
        return to_route('booking.index');
    }

    /**
     * @throws AuthorizationException
     */
    public function destroy(Event $event)
    {

        $this->authorize('canselReservation', $event);
        $bookings = $event->booking->where('booked_by', Auth::user()->participant->id);

        foreach ($bookings as $booking) {
            if ($booking->is_approved = true){
                $event = $booking->event;
                ++$event->available_seats;
                $event->update();
            }
            $booking->delete();
        }
        return back();
    }
}
