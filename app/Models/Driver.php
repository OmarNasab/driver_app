<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Driver extends Model
{
    use HasFactory;

    protected $table = 'drivers';


    protected $fillable = [
        'full_name',
        'email',
        'password',
        "image",
        "uaeID",
        "device_id",
        "status"
    ];


    /**
     * Get all the driver expenses
     * @return HasMany
     */
    public function expenses(): HasMany
    {
       return $this->hasMany(Expense::class);
    }
    public function missions(): HasMany
    {
        return $this->hasMany(Mission::class);
    }
}
