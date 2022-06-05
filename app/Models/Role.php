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
        'permissions',
    ];

    protected $casts=[
        "permissions"=>"array",
    ];

   private const capabilities=[
        "add_user",
        "edit_user",
        "delete_user",
        "show_user",
        "add_role",
        "edit_role",
        "delete_role",
        "show_role",
        "add_driver",
        "edit_driver",
        "delete_driver",
        "show_driver",
        "add_mission",
        "show_mission",
        "show_expense",
        "verify_expense"
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

    public function setPermissions($permission): array
    {
        $permissions=[];
        $roles=[];
        $capabilities=[];
        for($i=0;$i<count($permission);$i++){
            $loweredCase=strtolower($this->getRoleName($permission[$i]));
            $role=explode(" ",trim($loweredCase))[1];
            $capability=explode(" ",trim($loweredCase))[0];
            if(!in_array($role,$roles)){
                array_push($roles,$role);
                array_push($capabilities,[]);
            }
            array_push($capabilities[count($capabilities)-1],$capability);
        }
        for ($i=0;$i<count($roles);$i++){
            $permissions[$roles[$i]]=[];
        }
        for ($i=0;$i<count($capabilities);$i++){
            for($j=0;$j<count($capabilities[$i]);$j++){
                array_push($permissions[$roles[$i]],$capabilities[$i][$j]);
            }
        }
        return $permissions;
    }
    public function getCurrentPermissions(): array
    {
        return self::capabilities;
    }

}
