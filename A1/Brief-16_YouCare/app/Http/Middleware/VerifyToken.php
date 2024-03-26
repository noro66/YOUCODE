<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Mockery\Exception;
use Symfony\Component\HttpFoundation\Response;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class VerifyToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        try {
            $token =  $request->input('token');
            if ($token){
                $user = JWTAuth::parseToken()->authenticate();
            }
        }catch (\Exception $e){
            if ($e instanceof TokenInvalidException) {
                return \response()->json(['msg1' => 'token is invalid !!']);
            }
            if ($e instanceof TokenExpiredException) {
                return \response()->json(['msg2' => 'token is expired !!']);
            }

            return \response()->json(['msg3' => $e->getMessage()]);
        }
        return $next($request);
    }
}
