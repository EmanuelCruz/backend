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
                     "status" => "token invalido"
                ]);
            }
            if($e instanceof TokenExpiredException){
                return response()->json([
                     "status" => "El token expiro"
                ]);
            }

            return response()->json(["status" => "El token no se encontró"]);
        }

        return $next($request);
    }
}
