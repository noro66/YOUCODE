<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use http\Client\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Framework\MockObject\Exception;

class AuthController extends Controller
{
    function login(Request $request)
    {
        try {
            $credentials = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);
            $token = Auth::guard('api')->attempt($credentials);
            if (!$token) {
                return response()->json(['msg' => 'error']);
            }
            $user = Auth::guard('api')->user();
            $user->token = $token;
            return response()->json([
                'msg' => $user
            ]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
