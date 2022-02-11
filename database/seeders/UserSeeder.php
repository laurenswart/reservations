<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
        User::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        

        //Define data
        $users = [
            [
                'login'=>'lauren',
                'password'=>'epfc',
                'firstname'=>'Lauren',
                'lastname'=>'Swart',
                'email'=>'lauren.swart@gmail.com',
                'langue'=>'fr'
            ],
        ];
        
        //Insert data in the table
        DB::table('users')->insert($users);
    }
}
