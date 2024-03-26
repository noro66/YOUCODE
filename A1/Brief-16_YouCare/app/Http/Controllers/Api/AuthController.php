<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Nette\Schema\ValidationException;
use PHPUnit\Framework\MockObject\Exception;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('api')->except(['login', 'register']);
    }

    function login(Request $request)
    {
        try {
            try {
                $credentials = $request->validate([
                    'email' => 'required|email',
                    'password' => 'required',
                ]);
            } catch (ValidationException $e) {
                return $e->getMessage();
            }
            $token = Auth::guard('api')->attempt($credentials);
            if (!$token) {
                return response()->json(['msg' => 'error']);
            }
            $user = Auth::guard('api')->user();
            $user->token = $token;
            return response()->json([
                'msg' => $user
            ]);
        } catch (\Exception $e ) {
            return $e->getMessage();
        }
    }
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:6',
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

    public function logout(Request $request)
    {
        try {
                $request->user()->currentAccessToken()->delete();
                return response()->json(['message' => 'Successfully logged out']);

        } catch (\Exception $e) {
            return response()->json(['msg22' => $e->getMessage()]);
        }


    }
}
