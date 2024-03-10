<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        return view('organizer.dashboard');
    }

    public function profile()
    {
        return view('organizer.profile');
    }
}
