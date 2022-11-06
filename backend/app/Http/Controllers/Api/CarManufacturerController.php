<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CarManufacturerRequest;
use App\Services\Car\CreateCarManufacturerService;
use App\Services\Car\DeleteCarManufacturerService;
use App\Services\Car\GetCarManufacturersService;
use Illuminate\Http\Request;

class CarManufacturerController extends Controller
{
    public function index(GetCarManufacturersService $GetCarManufacturersService) {
        return $GetCarManufacturersService->execute();
    }

    public function store(CarManufacturerRequest $request, CreateCarManufacturerService $CreateCarManufacturerService) {
        return $CreateCarManufacturerService->execute($request->validated());
    }

    public function destroy($id, DeleteCarManufacturerService $DeleteCarManufacturerService) {
        return $DeleteCarManufacturerService->execute($id);
    }
}
