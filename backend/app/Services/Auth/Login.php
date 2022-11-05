<?php
namespace App\Services\Auth;

// use App\Models\User;
// use Illuminate\Support\Facades\Hash;

class Login {
    public function execute($data) {
        if(! auth()->attempt($data)){
            $resp = response()->json(['error' => 'Unauthorised Access'], 401);
        } else {
            $accessToken = auth()->user()->createToken('authToken')->accessToken;

            $resp = response(['user' => auth()->user(), 'access_token' => $accessToken], 200);
        }
        return $resp;
    }
}
