<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class TokenController extends Controller
{
    public function removeAllTokens(Request $request)
    {
        $request->user()->tokens()->delete();

        return [
            'message' => 'Removed all tokens'
        ];
    }
}
