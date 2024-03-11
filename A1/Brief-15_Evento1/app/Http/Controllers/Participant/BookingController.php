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
    public function store(Event $event)
    {
        $this->authorize('reserve', $event);
        $bookingForm['booked_by'] = Auth::user()->participant->id;
        $event->bookings()->create($bookingForm);

        return back();
    }

    /**
     * @throws AuthorizationException
     */
    public function cancelBooking(Event $event)
    {

//        $this->authorize('canselReservation', $event);
        return $event->bookings;


    }
}
