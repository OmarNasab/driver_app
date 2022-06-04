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
        $role=new Role();
        $role->name="admin";
        $role->permissions=json_encode([
            "user"=>[
                "add",
                "edit",
                "delete",
                "show",
            ],
            "driver"=>[
                "add",
                "edit",
                "delete",
                "show",
            ],
            "expense"=>[
                "verify",
                "show",
            ],
            "mission"=>[
                "add",
                "show",
            ],
            "role"=>[
                "add",
                "edit",
                "delete",
                "show",
            ]
        ]);
        $role->save();
    }
}
