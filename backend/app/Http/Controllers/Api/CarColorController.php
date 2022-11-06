<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarColorRequest;
use App\Services\Car\CreateCarColorService;
use App\Services\Car\DeleteCarColorService;
use App\Services\Car\GetCarColorsService;
use Illuminate\Http\Request;

class CarColorController extends Controller
{
    public function index(GetCarColorsService $GetCarColorsService) {
        return $GetCarColorsService->execute();
    }

    public function store(CarColorRequest $request, CreateCarColorService $CreateCarColorService) {
        return $CreateCarColorService->execute($request->validated());
    }

    public function destroy($id, DeleteCarColorService $DeleteCarColorService) {
        return $DeleteCarColorService->execute($id);
    }
}
