<?php

namespace App\Http\Controllers\organizer;

use App\Http\Controllers\Controller;
use App\Mail\WebsiteMail;
use App\Models\Organizer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class OrganizerController extends Controller
{
    public function dashboard()
    {
        return view('organizer.dashboard');
    }

    public function registerIndex()
    {
        return view('organizer.register');
    }

    /**
     * @throws ValidationException
     */
    public function  registerStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'email|required|max:255',
            'password' => 'required|confirmed'
        ]);
        $user = Organizer::create([
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        Auth::guard('organizer')->attempt($request->only(['email', 'password']), $request->input('remember_me'));

        return to_route('organizer.dashboard');

    }

    public function login()
    {
        return view('organizer.login');
    }

    /**
     * @throws ValidationException
     */
    public  function loginStore(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|max:255',
            'password' => 'required'
        ]);
        if(!Auth::guard('organizer')->attempt($request->only(['email', 'password']), $request->input('remember_me'))){
            return  back()->with('status', 'Invalid login details');
        }
        session()->regenerate();
        return to_route('organizer.dashboard');
    }

    public function logoutOrganizer()
    {
        Auth::guard('organizer')->logout();

        return to_route('organizer.login');
    }
    public function forgetPassword()
    {
        return view('organizer.forget-password');
    }

    /**
     * @throws ValidationException
     */
    public function forgetPasswordSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:30',
        ]);
        $organizer = Organizer::where('email', $request->input('email'))->first();
        $token = hash('sha256', Str::random(32));
        $organizer->token = $token;
        $organizer->save();
        $link = url('organizer/reset_password/'. $token . '/' . $request->input('email'));
        $subject = 'Reset Password';
        $body = 'Please Click on the button below to reset your  password';
        Mail::to($request->input('email'))->send( new WebsiteMail($subject, $body, $link));
        return back()->with('success', 'Reset password Sent successfully');
    }

    public function  resetPassword($token, $email)
    {
        if (!Organizer::where('token', $token)->where('email', $email)->first()){
            return to_route('organizer.login')->with('error', 'Invalid token or email');
        }
        return  view('organizer.reset-password', compact('token', 'email'));
    }

    public function resetPasswordSubmit(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed'
        ]);
        $organizer = Organizer::where('email', $request->input('email'))
            ->where('token', $request->input('token'))->first();
        $organizer->password = Hash::make($request->input('password'));
        $organizer->token = '';
        $organizer->update();

        return to_route('organizer.login')->with('success', 'Password reset successfully ');
    }


}
