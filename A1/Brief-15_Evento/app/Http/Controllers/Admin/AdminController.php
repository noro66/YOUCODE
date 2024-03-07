<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use App\Mail\WebsiteMail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

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

    public function logoutAdmin()
    {
        Auth::guard('admin')->logout();

        return to_route('home');
    }
    public function forgetPassword()
    {
        return view('admin.forget-password');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:30',
        ]);
       $admin = Admin::where('email', $request->input('email'))->first();
       $token = Hash::make(time());
       $admin->token = $token;
       $admin->save();
       $resetPasswordLink = url('admin/reset_password/'. $token . '/' . $request->input('email'));
        $subject = 'Reset Password';
        $body = 'Please Click on the button below to reset your  password';
        Mail::to($request->input('email'))->send( new WebsiteMail($subject, $body, $resetPasswordLink));
        return back()->with('success', 'Reset password Sent successfully');
    }
}
