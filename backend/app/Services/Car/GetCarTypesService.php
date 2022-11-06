<?php
namespace App\Services\Car;
use App\Models\Type;

class GetCarTypesService {
    public function execute() {
        $result = Type::orderBy('id', 'DESC')->get();
        return response()->json($result, 200);
    }
}
