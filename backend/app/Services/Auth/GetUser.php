<?php
namespace App\Services\Auth;


class GetUser {
    public function execute() {
        $user = auth('api')->user();

        if(isset($user)) {
            return response()->json($user);
        } else {
            abort(401);
        }
    }
}
