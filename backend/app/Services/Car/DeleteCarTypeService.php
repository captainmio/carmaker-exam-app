<?php
namespace App\Services\Car;
use App\Models\Type;

class DeleteCarTypeService {
    public function execute($id) {
        Type::destroy($id);
        return response()->json(["success" => true], 200);
    }
}
