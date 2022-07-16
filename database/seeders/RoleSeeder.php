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
        $permissions=["user"=>[
            "add",
            "edit",
        ],
            "driver"=>[
                "add",
                "edit",
                "show"
            ],
            "vehicle"=>[
                "add",
                "edit",
                "show"
            ],
            "expense"=>[
                "verify",
                "show"
            ],
            "mission"=>[
                "add",
                "show"
            ],
            "role"=>[
                "add",
                "edit",

            ]];
        $role=new Role();
        $role->name="admin";
        $role->permissions=$permissions;
        $role->save();
    }
}
