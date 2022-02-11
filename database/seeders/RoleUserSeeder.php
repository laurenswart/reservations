<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //login-password-firstname-lastname-email-langue
        //Empty the table first
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('role_user')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        

        //Define data
        $roleUsers = [
            [
                'role_id'=>1,
                'user_id'=>1,
            ],
        ];
        
        //Insert data in the table
        DB::table('role_user')->insert($roleUsers);
    }
}
