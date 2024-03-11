<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ParticipantController extends Controller
{
    public function dashboard()
    {
        return view('participant.dashboard');
    }

    public  function profile()
    {
        $user = Auth::user();
        return view('participant.profile', compact('user'));
    }
}
