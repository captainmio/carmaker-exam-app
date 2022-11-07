<?php
namespace App\Services\Car;
use App\Models\Car;

class GetCarsService {
    public function execute() {
        $result = Car::orderBy('id', 'DESC')->get();
        return response()->json($result, 200);
    }
}
