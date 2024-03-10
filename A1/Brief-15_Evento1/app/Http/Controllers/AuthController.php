<?php

namespace App\Http\Controllers;


use App\Mail\WebsiteMail;
use App\Models\Organizer;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function registerAsOrganizer()
    {
        return view('auth.registerAsOrganiser');
    }
    public function registerAsParticipant()
    {
        return view('auth.registerAsParticipant');
    }

    /**
     * @throws ValidationException
     */
    public function registerSave(Request $request)
    {
        Validator::make($request->all(),[
            'name' => 'required|max:255||unique:users,name',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'type' => 'required|in:organizer,participant'
        ])->validate();
//        dd($request->all());

       $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
           'type' => $request->input('type')
        ]);
        if ($user->type === 'organizer'){
            Organizer::create([
                'user_id' => $user->id,
            ]);
        }elseif ($user->type === 'participant'){
            Participant::create([
                'user_id' => $user->id,
            ]);
        }
        return to_route('login');
    }

    public function login()
    {
        return view('auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function loginAction(Request $request)
    {
        Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required',
        ])->validate();

        if (!Auth::attempt($request->only('email', 'password'), $request->boolean('remember'))){
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        };
        $request->session()->regenerate();
        return to_route(Auth::user()->type . '.dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('home');
    }

    public function forgetPassword()
    {
        return view('auth.forget-password');
    }

    public function forgetPasswordSubmit(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email|max:30',
        ]);
        $user = User::where('email', $request->input('email'))->first();
        $token = hash('sha256', Str::random(32));
        $user->token = $token;
        $user->save();
        $link = url('auth.reset_password/'. $token . '/' . $request->input('email'));
        $subject = 'Reset Password';
        $body = 'Please Click on the button below to reset your  password';
        Mail::to($request->input('email'))->send( new WebsiteMail($subject, $body, $link));
        return back()->with('success', 'Reset password Sent successfully');
    }

    public function  resetPassword($token, $email)
    {
        if (!User::where('token', $token)->where('email', $email)->first()){
            return to_route('auth.login')->with('error', 'Invalid token or email');
        }
        return  view('auth.reset-password', compact('token', 'email'));
    }

    /**
     * @throws ValidationException
     */
    public function resetPasswordSubmit(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|confirmed',
            'email' => 'required|email',
            'token' => 'required'
        ]);
        $user = User::where('email', $request->input('email'))
            ->where('token', $request->input('token'))->first();
        if ($user){
            $user->password = Hash::make($request->input('password'));
            $user->token = '';
            $user->update();
        }else {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed'),
            ]);
        }

        return to_route('auth.login')->with('success', 'Password reset successfully ');
    }
}
