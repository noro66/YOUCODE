<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('admin.profile', compact('user'));
    }

    public function events()
    {
        $events = Event::where('status',  '=', 'Pending' )->paginate(4);

        return view('admin.events', compact('events'));
    }

    public function approve()
    {

    }
}
