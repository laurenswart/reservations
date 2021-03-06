<?php

namespace Database\Seeders;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reservation::truncate();

        //Define data
        $reservations = [
            [
                'user_login'=>'lauren',
                'representation_id'=>1,
                'places'=>2,
                'created_at'=>'2022-05-21'
            ],
            [
                'user_login'=>'aboubacar',
                'representation_id'=>2,
                'places'=>1,
                'created_at'=>'2022-05-26'
            ],
            [
                'user_login'=>'amine',
                'representation_id'=>4,
                'places'=>3,
                'created_at'=>'2022-04-21'
            ],
            [
                'user_login'=>'lauren',
                'representation_id'=>4,
                'places'=>2,
                'created_at'=>'2022-05-27'
            ],
            [
                'user_login'=>'amine',
                'representation_id'=>2,
                'places'=>3,
                'created_at'=>'2022-05-30'
            ],
        ];
        //Prepare the data
        foreach ($reservations as &$data) {
            //Search the user by login
            $user = User::firstWhere('login',$data['user_login']);
            unset($data['user_login']);
            
            $data['user_id'] = $user->id ?? null;
        }
        unset($data);


        //Insert data in the table
        DB::table('reservations')->insert($reservations);
    }
}
