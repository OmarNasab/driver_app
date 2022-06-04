<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Role extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'name',
        'permission',
    ];

    protected $casts=[
        "permission"=>array(),
    ];


    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function getRoleName($key): string
    {
        $withOuUnderscore=str_replace("_"," ",$key);
        return ucwords($withOuUnderscore);
    }

}
