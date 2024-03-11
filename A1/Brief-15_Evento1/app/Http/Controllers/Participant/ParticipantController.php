<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        return view('participant.dashboard', compact('user'));
    }

    public  function profile()
    {
        $user = Auth::user();
        return view('participant.dashboard', compact('user'));
    }
}
