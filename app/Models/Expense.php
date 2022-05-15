<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Expense extends Model
{
    use HasFactory;

    protected $table = 'expenses';


    /*
     *Check status of the expense
     */
    const NOT_VERIFIED=0;
    const VALID = 1;
    const INVALID = 2;


    protected $fillable = [
        'driver_id',
        'category',
        'amount',
        "description",
        "attachment"
    ];


    /**
     * Get the driver who issued this expense
     * @return BelongsTo
     */
    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

}
