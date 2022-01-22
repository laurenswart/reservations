<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Empty the table first
        Role::truncate();

        //Define data
        $roles = [
            ['role'=>'admin'],
            ['role'=>'member'],
            ['role'=>'affiliate'],
        ];

        //Insert data in the table
        DB::table('roles')->insert($roles);
    }
}
