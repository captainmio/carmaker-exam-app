<?php
namespace App\Services\Car;
use App\Models\Manufacturer;

class DeleteCarManufacturerService {
    public function execute($id) {
        Manufacturer::destroy($id);
        return response()->json(["success" => true], 200);
    }
}
