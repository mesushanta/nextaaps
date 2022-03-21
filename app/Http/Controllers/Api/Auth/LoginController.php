<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            $user = Auth::user();
            $token = $user->createToken(env('APP_KEY'))->plainTextToken;

            $response = [
                'status' => 'success',
                'data' => [
                    'user' => $user,
                    'token' => $token
                ]
            ];

            return response($response, 200);
        }
    }


}
