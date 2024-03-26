<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['login', 'register']);
    }

    function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|max:255',
        ]);
        $token = JWTAuth::attempt($credentials);
        if ($token){
            return response()->json([
                'status' => true,
                'message'  => 'User sign in successfully',
                'token' => $token
            ]);
        }
        return response()->json([
               'status' => false,
                'message' => 'Invalid login details'
            ]);
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6|max:255',
        ]);
          $user = User::create([
               'name'=> $credentials['name'],
               'email'=> $credentials['email'],
               'password'=> Hash::make($credentials['password'])
           ]);
        return \response()->json([
           'status' => true,
            'message' => 'User Created Successfully'
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return \response()->json([
            'status' => true,
            'message' => 'Logout Successfully !!',
        ]);

    }
    public function profile(): \Illuminate\Http\JsonResponse
    {
        $userData = Auth::user();
        return \response()->json([
            'status' => true,
            'message' => 'Profile Data',
            'User' => $userData,
        ]);
    }

    public function refresh(): \Illuminate\Http\JsonResponse
    {
        $newToken = Auth::refresh();
        return \response()->json([
            'status' => true,
            'message' => 'Access token generated successfully',
            'token' => $newToken,
        ]);
    }
}
