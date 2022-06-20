<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $table = "vehicles";
    protected $fillable = [
        "traffic_plate_number",
        "type",
        "model",
        "place_of_issue",
        "registration_date",
        "expiration_date",
        "insurance_expiration_date",
        "kilometrage",
        "license_front_side",
        "license_back_side",
        "status"
    ];

    public function missions(): HasMany
    {
        return $this->hasMany(Mission::class);
    }

}
