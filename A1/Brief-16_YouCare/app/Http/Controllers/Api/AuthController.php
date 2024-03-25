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

class AuthController extends Controller
{
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
        try {
            try {
                $credentials = $request->validate([
                    'name' => 'required|string|max:255',
                    'email' => 'required|string|email|max:255|unique:users',
                    'password' => 'required|string|min:6',
                ]);
            } catch (ValidationException $e) {
                return $e->getMessage();
            }
          $user = User::create([
               'name'=> $credentials['name'],
               'email'=> $credentials['email'],
               'password'=> Hash::make($credentials['password'])
           ]);
            return $user ??   \response()->json(['msg' => 'error']);
        }catch (\Exception $e){
            return $e->getMessage();
        }

    }
}
