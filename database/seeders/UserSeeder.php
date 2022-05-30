<?php

namespace Database\Seeders;

use DB;
use Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            "email"=>"admin@kgc-driver.com",
            "name"=>"admin",
            "password"=> Hash::make("admin"),
            "role_id"=>1
        ]);
    }
}
