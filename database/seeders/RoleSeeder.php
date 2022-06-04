<?php

namespace Database\Seeders;

use App\Models\Role;
use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        DB::table("roles")->insert([
            "name"=>"admin",
            "permissions"=> json_encode([
                "add_users",
                "edit_users",
                "delete_users",
                "show_users",
                "add_drivers",
                "edit_drivers",
                "delete_drivers",
                "show_drivers",
                "show_expenses",
                "verify_expenses",
                "add_mission",
                "show_mission",
                "add_roles",
                "edit_roles",
                "delete_roles",
                "show_roles",
            ])
        ]);

    }
}
