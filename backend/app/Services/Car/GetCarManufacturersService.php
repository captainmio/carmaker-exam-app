<?php
namespace App\Services\Car;
use App\Models\Manufacturer;

class GetCarManufacturersService {
    public function execute() {
        $result = Manufacturer::orderBy('id', 'DESC')->get();
        return response()->json($result, 200);
    }
}
