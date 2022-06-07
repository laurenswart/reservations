<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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
                'password'=> bcrypt('password'),
                'firstname'=>'Lauren',
                'lastname'=>'Swart',
                'email'=>'lauren.swart@gmail.com',
                'langue'=>'fr'
            ],
            [
                'login'=>'aboubacar',
                'password'=> bcrypt('password'),
                'firstname'=>'Aboubacar',
                'lastname'=>'Toure',
                'email'=>'aboubacar.toure@gmail.com',
                'langue'=>'fr'
            ],
            [
                'login'=>'amine',
                'password'=> bcrypt('password'),
                'firstname'=>'Amine',
                'lastname'=>'AminoPapy',
                'email'=>'amine.papy@gmail.com',
                'langue'=>'fr'
            ],
        ];
        
        //Insert data in the table
        DB::table('users')->insert($users);
    }
}
