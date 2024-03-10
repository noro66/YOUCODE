<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class BookingController extends Controller
{
    /**
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $bookingForm = $this->validate($request, [
            'event_id' => 'required|exists:events,id',
        ]);
        $bookingForm['booked_by'] = Auth::user()->participant->id;
        Booking::create($bookingForm);
        return back();
    }

    public function destroy($booking)
    {

    }
}
