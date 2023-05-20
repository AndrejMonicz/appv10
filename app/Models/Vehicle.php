<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BrandVehicle;
use App\Models\Company;
use App\Models\VehicleTypel;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = false;
    protected $table = 'vehicles';

    protected $fillable = [
        'vehicle_type_id',
        'company_id',
        'board_number',
        'license_plate',
        'brand_vehicle_id',
        'description',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id', 'id');
    }

    public function brandVehicle()
    {
        return $this->belongsTo(BrandVehicle::class, 'brand_vehicle_id', 'id');
    }

    public function vehicleType()
    {
        return$this->belongsTo(VehicleType::class, 'vehicle_type_id', 'id');
    }

}
