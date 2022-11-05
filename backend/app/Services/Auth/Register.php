<?php
namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class Register {
    public function execute($data) {
        $data['password'] = Hash::make($data['password']);
        User::create($data);

        return response()->json(['status' => 'success', 'message' => 'User successfully register.'], 200);
    }
}
