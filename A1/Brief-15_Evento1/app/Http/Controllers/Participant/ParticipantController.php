<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;

class ParticipantController extends Controller
{
    public function dashboard()
    {
        return view('participant.dashboard');
    }
}
