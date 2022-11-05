<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Services\Auth\Register;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register(RegisterRequest $request, Register $register) {
        return $register->execute($request->validated());
    }
}
