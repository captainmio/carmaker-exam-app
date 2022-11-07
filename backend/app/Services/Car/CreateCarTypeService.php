<?php
namespace App\Services\Car;
use App\Models\Type;

class CreateCarTypeService {
    public function execute($data) {

        // search first if type already exist
        $type_exist = Type::where('name', '=', $data['type'])->first();
        if(empty($type_exist)) {
            $result = new Type();
            $result->name = $data['type'];
            $result->save();
    
            if($result->id) {
                return response()->json(['status' => 'success', 'message' => 'Type successfully added'], 200);
            } else {
                return abort(404, 'Error when creating type');
            }
        } else {
            return abort(404, 'Type already exist');
        }
        
    }
}
