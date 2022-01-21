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
        Type::truncate();

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
