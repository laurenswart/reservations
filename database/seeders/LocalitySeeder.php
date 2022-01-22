<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Locality;

class LocalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //Empty the table first
       DB::statement('SET FOREIGN_KEY_CHECKS=0');
       Locality::truncate();
       DB::statement('SET FOREIGN_KEY_CHECKS=1');


        //Define data
        $localities = [
            ['postal_code'=>'7000', 'locality'=>'Mons'],
            ['postal_code'=>'5000', 'locality'=>'Namur'],
            ['postal_code'=>'1000', 'locality'=>'Bruxelles'],
            ['postal_code'=>'5100', 'locality'=>'Jambes'],
            ['postal_code'=>'3000', 'locality'=>'Leuven'],
            ['postal_code'=>'9000', 'locality'=>'Gand'],
            ['postal_code'=>'2000', 'locality'=>'Anvers'],
            ['postal_code'=>'1170', 'locality'=>'Watermael-Boitsfort'],
        ];

        //Insert data in the table
        DB::table('localities')->insert($localities);
    }
}
