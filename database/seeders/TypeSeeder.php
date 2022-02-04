<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
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
        Type::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        

        //Define data
        $types = [
            ['type'=>'auteur'],
            ['type'=>'scénographe'],
            ['type'=>'comédien'],
        ];
        
        //Insert data in the table
        DB::table('types')->insert($types);
    }
}
