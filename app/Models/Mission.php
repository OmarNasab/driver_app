<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mission extends Model
{
    use HasFactory;
    protected $table = 'missions';

    const IN_PROGRESS=0;
    const COMPLETED = 1;

    protected $fillable = [
        "user_id",
        'driver_id',
        "vehicle_id",
        'description',
        "type",
        'stops',
        'direction',
        "invoices",
        "status",
        "completed_date"
    ];

    protected $casts = [
        'stops' => 'array',
        'direction' => 'array',
        "invoices"=>"array"
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class);
    }



}
