<?php
namespace App\Services\Car;
use App\Models\Color;

class DeleteCarColorService {
    public function execute($id) {
        Color::destroy($id);
        return response()->json(["success" => true], 200);
    }
}
