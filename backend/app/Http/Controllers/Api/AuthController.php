<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Services\Auth\Login;
use App\Services\Auth\Register;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, Register $register) {
        return $register->execute($request->validated());
    }

    public function login(LoginRequest $request, Login $login) {
        return $login->execute($request->validated());
    }
}
