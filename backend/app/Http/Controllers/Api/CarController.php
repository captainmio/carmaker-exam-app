<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\Car\GetCarColorsService;
use App\Services\Car\GetCarManufacturersService;
use App\Services\Car\GetCarTypesService;
use App\Services\Car\CreateCarService;
use App\Services\Car\GetCarsService;

use App\Http\Requests\CreateCarRequest;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function getAttributes(GetCarColorsService $GetCarColorsService, GetCarManufacturersService $GetCarManufacturersService, GetCarTypesService $GetCarTypesService) {
        $colors = $GetCarColorsService->execute();
        $manufacturers = $GetCarManufacturersService->execute();
        $types = $GetCarTypesService->execute();

        return response()->json([
            'colors' => $colors->original,
            'manufacturers' => $manufacturers->original,
            'types' => $types->original,
        ]);

    }

    public function store(CreateCarRequest $request, CreateCarService $CreateCarService) {
        return $CreateCarService->execute($request->validated());
    }

    public function index(GetCarsService $GetCarsService) {
        return $GetCarsService->execute();
    }
}
