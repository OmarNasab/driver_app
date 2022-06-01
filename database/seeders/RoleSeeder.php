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
            "permission"=> json_encode([
                "add_users"=>1,
                "edit_users"=>1,
                "delete_users"=>1,
                "show_users"=>1,
                "add_drivers"=>1,
                "edit_drivers"=>1,
                "delete_drivers"=>1,
                "show_drivers"=>1,
                "show_expenses"=>1,
                "approve_expenses"=>1,
                "add_mission"=>1,
                "show_mission"=>1,
                "add_roles"=>1,
                "edit_roles"=>1,
                "delete_roles"=>1,
                "show_roles"=>1,
            ])
        ]);

    }
}
