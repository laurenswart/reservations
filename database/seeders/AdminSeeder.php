<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Admin::truncate();

        //le 1 veut dire une seule donnée
        Admin::factory(1)->create([
            'email'=>'admin@epfc.com'
        ]);

    }
}
