<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
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
        Category::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $categories = [
            ['name'=>'humoristique'],
            ['name'=>'musical'],
            ['name'=>'dramatique'],
            ['name'=>'tragédie'],
            ['name'=>'absurde']
        ];

        //Insert data in the table
        DB::table('categories')->insert($categories);
    }
}
