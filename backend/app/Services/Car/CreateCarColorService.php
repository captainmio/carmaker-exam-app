<?php
namespace App\Services\Car;
use App\Models\Color;

class CreateCarColorService {
    public function execute($data) {

        // search first if color already exist
        $color_exist = Color::where('name', '=', $data['color'])->first();
        if(empty($color_exist)) {
            $result = new Color();
            $result->name = $data['color'];
            $result->save();
    
            if($result->id) {
                return response()->json(['status' => 'success', 'message' => 'Color successfully addess'], 200);
            } else {
                return abort(404, 'Error when creating color');
            }
        } else {
            return abort(404, 'Color already exist');
        }
        
    }
}
