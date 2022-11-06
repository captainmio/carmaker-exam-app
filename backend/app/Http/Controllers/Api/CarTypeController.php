<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarTypeRequest;
use App\Services\Car\CreateCarTypeService;
use App\Services\Car\DeleteCarTypeService;
use App\Services\Car\GetCarTypesService;
use Illuminate\Http\Request;

class CarTypeController extends Controller
{
    public function index(GetCarTypesService $GetCarTypesService) {
        return $GetCarTypesService->execute();
    }

    public function store(CarTypeRequest $request, CreateCarTypeService $CreateCarTypeService) {
        return $CreateCarTypeService->execute($request->validated());
    }

    public function destroy($id, DeleteCarTypeService $DeleteCarTypeService) {
        return $DeleteCarTypeService->execute($id);
    }
}
