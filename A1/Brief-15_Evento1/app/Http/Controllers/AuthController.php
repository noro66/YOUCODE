<?php

namespace App\Http\Controllers;


use App\Models\Organizer;
use App\Models\Participant;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function registerAsOrganizer()
    {
        return view('auth.registerAsOrganizer');
    }
    public function registerAsParticipant()
    {
        return view('auth.registerAsParticipant');
    }

    /**
     * @throws ValidationException
     */
    public function registerSave(Request $request): \Illuminate\Http\RedirectResponse
    {
        Validator::make($request->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'type' => 'required| in:organizer,participant'
        ])->validate();

       $user =  User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);
        if ($request->input('type') === 'organizer'){
            Organizer::create([
                'user_id' => $user->id,
            ]);
        }elseif ($request->input('type') === 'participant'){
            Participant::create([
                'user_id' => $user->id,
            ]);
        }
        return to_route('login');
    }

    public function login()
    {
        return view('Auth.login');
    }

    /**
     * @throws ValidationException
     */
    public function loginAction(Request $request): \Illuminate\Http\RedirectResponse
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

    public function logout(Request $request): \Illuminate\Http\RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        return to_route('login');
    }
}
