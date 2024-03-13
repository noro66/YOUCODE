<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        $organizer = Auth::user()->organizer;
//        $trashed_events = Event::onlyTrashed()->where('added_by', '=', $organizerId)->count();
//        $not_trashed_events = Event::withoutTrashed()->where('added_by', '=', $organizerId)->count();
        $trashed_events = $organizer->events()->onlyTrashed()->count();
        $not_trashed_events =   $organizer->events()->withoutTrashed()->count();
        $total_events = $trashed_events + $not_trashed_events;

        return view('organizer.dashboard',
            compact('trashed_events', 'not_trashed_events', 'total_events'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('organizer.profile', compact('user'));
    }
}
