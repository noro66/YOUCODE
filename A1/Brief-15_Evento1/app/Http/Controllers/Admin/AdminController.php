<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\User;
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
        $events = Event::where('status',  '=', 'Pending' )->get();

        return view('admin.events', compact('events'));
    }

    public function approve(Event $event)
    {
        $event->status = 'Approved';
        $event->update();
        return back();
    }

    public function users()
    {
        $users = User::where('type', '!=', 'admin')->paginate(10);
        return view('admin.users', compact('users'));
    }

    public function restrict(User $user)
    {
        $user->is_restricted  ?  $user->is_restricted = false : $user->is_restricted = true;
        $user->update();
        return back()->with('success', 'the user has been restricted successfully !');
    }
}
