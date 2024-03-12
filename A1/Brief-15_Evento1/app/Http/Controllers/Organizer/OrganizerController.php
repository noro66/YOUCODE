<?php

namespace App\Http\Controllers\Organizer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('organizer.profile', compact('user'));
    }

    public function profile()
    {
        $user = Auth::user();
        return view('organizer.profile', compact('user'));
    }
}
