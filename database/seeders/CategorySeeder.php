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
 
         //Define data
         $categories = [
             ['type'=>'comédie'],
             ['type'=>'dramatique'],
             ['type'=>'humoristique'],
             ['type'=>'comédie musicale'],
             ['type'=>'romantique'],
         ];
 
         //Insert data in the table
         DB::table('categories')->insert($categories);
    }
}
