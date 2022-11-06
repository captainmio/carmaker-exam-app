<?php
namespace App\Services\Car;
use App\Models\Color;

class GetCarColorsService {
    public function execute() {
        $result = Color::orderBy('id', 'DESC')->get();
        return response()->json($result, 200);
    }
}
