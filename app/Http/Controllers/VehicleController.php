<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\StoreRequest;
use App\Models\VehicleType;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Vehicle;
use App\Models\Company;
use App\Models\BrandVehicle;

class VehicleController extends Controller
{
    //
    public function index()
    {
        // Получить список транспортных средств
        $vehicles = Vehicle::all();
        $companies = Company::all();
        $vehicle_types = VehicleType::all();
        $brand_vehicle = BrandVehicle::all();

       return Inertia::render('Vehicles/Index', [

           'vehicles' => $vehicles->map(function ($vehicle){
               return [
                   'id' => $vehicle->id,
                   'vehicle_type' => $vehicle->vehicleType->title,
                   'company_title' => $vehicle->company->title,
                   'board_number' => $vehicle->board_number,
                   'license_plate' => $vehicle->license_plate,
                   'brand_vehicle' => $vehicle->brandVehicle->title,
                   'description' => $vehicle->description,
                   ];
           }),

        ]);
    }

    public function create()
    {
        // Отобразить форму создания нового транспортного средства
        return  Inertia::render('Vehicles/Create');
    }

    public function store(StoreRequest $request)
    {
        // Валидация данных $request->validate(...)

        Vehicle::create($request->validated());

        return redirect()->route('vehicles.index');
    }

    public function edit(Vehicle $vehicle)
    {
        // Отобразить форму редактирования существующего транспортного средства
        return Inertia::render('Vehicles/Edit', [
            'vehicle' => $vehicle,
        ]);
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $vehicle->update([
            'type' => $request->type,
            'company_owner_id' => $request->company_owner_id,
            'board_number' => $request->board_number,
            'license_plate' => $request->license_plate,
            'brand_vehicle_id' => $request->brand_vehicle_id,
            'description' => $request->description,
        ]);

        return redirect()->route('vehicles.index');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        return redirect()->route('vehicles.index');
    }
}
