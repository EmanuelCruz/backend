<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user','token'),201);
    }

    public function login(Request $request)
    {
        $credenciales = $request->only('email','password');

        try {
            $token = JWTAuth::attempt($credenciales);
            if (!$token){
                return response()->json([
                    'status' => "credenciales invalidas"
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'status' => 'El token no se pudo crear',
            ], 500);
        }

        return response()->json([
            'token' => $token
        ]);
    }
}
