<?php
namespace App\Services\Car;
use App\Models\Manufacturer;

class CreateCarManufacturerService {
    public function execute($data) {

        // search first if manufacturer already exist
        $manufacturer_exist = Manufacturer::where('name', '=', $data['manufacturer'])->first();
        if(empty($manufacturer_exist)) {
            $result = new Manufacturer();
            $result->name = $data['manufacturer'];
            $result->save();
    
            if($result->id) {
                return response()->json(['status' => 'success', 'message' => 'Manufacturer successfully added'], 200);
            } else {
                return abort(404, 'Error when creating manufacturer');
            }
        } else {
            return abort(404, 'Manufacturer already exist');
        }
        
    }
}
