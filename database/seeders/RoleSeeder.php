<?php

namespace Database\Seeders;

use App\Models\Role;
use DB;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions=[
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
            "show_expense",
            "verify_expense",
            "show_mission",
            "add_mission",
            ];
        $jsonPermissions=json_encode($permissions);
        $role=new Role();
        $role->name="admin";
        $role->permissions=[];
        $role->save();

    }
}
