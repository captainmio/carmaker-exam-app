<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\Login;
use App\Services\Auth\Register;
use App\Services\Auth\GetUser;
use Illuminate\Http\Request;

use Auth;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, Register $register) {
        return $register->execute($request->validated());
    }

    public function login(LoginRequest $request, Login $login) {
        return $login->execute($request->validated());
    }

    public function logout(Request $request) {
        Auth::logout();
        return response()->json(true);
    }

    public function loginUser(GetUser $GetUser) {
        return $GetUser->execute();
    }
}
