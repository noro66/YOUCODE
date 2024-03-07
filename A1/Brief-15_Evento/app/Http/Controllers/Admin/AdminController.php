<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('admin.login');
    }

    public  function loginStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required'
        ]);
        if(!Auth::guard('admin')->attempt($request->only(['email', 'password']), $request->input('remember_me'))){
            return  back()->with('status', 'Invalid login details');
        }
        session()->regenerate();
        return to_route('admin.dashboard');
    }
}
