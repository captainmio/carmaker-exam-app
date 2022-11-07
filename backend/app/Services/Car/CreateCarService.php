<?php
namespace App\Services\Car;
use App\Models\Cars;

class CreateCarService {
    public function execute($data) {

        $car_exist = Cars::where('name', '=', $data['name'])->first();

        if(empty($car_exist)) {
            $car = new Cars();
            $car->name = $data['name'];
            $car->color = $data['color'];
            $car->type = $data['type'];
            $car->manufacturer = $data['manufacturer'];
            $car->save();

            if($car->id) {
                return response()->json(['status' => 'success', 'message' => 'Car successfully created'], 200);
            } else {
                return abort(404, 'Error when creating manufacturer');
            }

        } else {
            return abort(404, 'Car name already exist');
        }

       
        
    }
}
