<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $request->email)->first();

        if($user && Hash::check($request->password, $user->password)){
            $abilities = [];
            if($user->isAdmin){
                array_push($abilities, 'admin:all');
            }
            $token = $user->createToken('tokensecret', $abilities)->plainTextToken;

            return [
                'user' => $user,
                'token' => $token
            ];
        }

        return response([
            'message' => 'Wrong email or password.'
        ], 401);

    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return [
            'message' => 'Logged out'
        ];
    }
}
