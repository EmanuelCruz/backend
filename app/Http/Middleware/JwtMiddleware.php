<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{

    public function handle(Request $request, Closure $next)
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (Exception $e) {

            if($e instanceof TokenInvalidException){
                return response()->json([
                     'status' => 'El token es invalido'
                ], 401);
            }
            if($e instanceof TokenExpiredException){
                return response()->json([
                     'status' => 'El token expiro'
                ], 401);
            }

            return response()->json(['status' => 'No tiene autorizacion'], 401);
        }

        return $next($request);
    }
}
