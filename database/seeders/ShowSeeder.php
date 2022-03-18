<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Location;
use App\Models\Show;

class ShowSeeder extends Seeder
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
        Show::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        
        //Define data
        $shows = [
            [
                'slug'=>null,
                'title'=>'Ayiti',
                'description'=>"Un homme est bloqué à l’aéroport.\n "
                    . 'Questionné par les douaniers, il doit alors justifier son identité, '
                    . 'et surtout prouver qu\'il est haïtien – qu\'est-ce qu\'être haïtien ?',
                'poster_url'=>'ayiti.jpg',
                'location_slug'=>'espace-delvaux-la-venerie',
                'bookable'=>true,
                'price'=>8.50,
                'category'=>'humoristique'
            ],
           [
                'slug'=>null,
                'title'=>'Cible mouvante',
                'description'=>'Dans ce « thriller d’anticipation », des adultes semblent alimenter '
                    . 'et véhiculer une crainte féroce envers les enfants âgés entre 10 et 12 ans.',
                'poster_url'=>'cible.jpg',
                'location_slug'=>'dexia-art-center',
                'bookable'=>true,
                'price'=>9.00,
                'category'=>'tragédie'
            ],
            [
                'slug'=>null,
                'title'=>'Ceci n\'est pas un chanteur belge',
                'description'=>"Non peut-être ?!\nEntre Magritte (pour le surréalisme comique) "
                    . 'et Maigret (pour le réalisme mélancolique), ce dixième opus semalien propose '
                    . 'quatorze nouvelles chansons mêlées à de petits textes humoristiques et '
                    . 'à quelques fortes images poétiques.',
                'poster_url'=>'claudebelgesaison220.jpg',
                'location_slug'=>null,
                'bookable'=>false,
                'price'=>5.50,
                'category'=>'dramatique'
            ],
            [
                'slug'=>null,
                'title'=>'Manneke… !',
                'description'=>'A tour de rôle, Pierre se joue de ses oncles, '
                    . 'tantes, grands-parents et surtout de sa mère.',
                'poster_url'=>'wayburn.jfif',
                'location_slug'=>'la-samaritaine',
                'bookable'=>true,
                'price'=>10.50,
                'category'=>'dramatique'
            ],
            [
                'slug'=>null,
                'title'=>'Cézanne',
                'description'=>'Les visiteurs et visiteuses arrivent des quatre coins du monde dans l’atelier de Cézanne,'
                            .' sur les traces d’une révolution picturale qui a transformé l’art, le regard et la vie.',
                'poster_url'=>'cezanne.jpg',
                'location_slug'=>'espace-delvaux-la-venerie',
                'bookable'=>true,
                'price'=>9.50,
                'category'=>'absurde'
            ],
            [
                'slug'=>null,
                'title'=>'Promising Young Woman',
                'description'=>'Cassie comptait devenir médecin jusqu’au jour où un incident dramatique a bouleversé sa vie.',
                'poster_url'=>'promisingyoungwoman.jpeg',
                'location_slug'=>'espace-delvaux-la-venerie',
                'bookable'=>true,
                'price'=>7.50,
                'category'=>'tragédie'
            ],
        ];
        
        //Prepare the data
        foreach ($shows as &$data) {
            //Search the location for a given location's slug
            $location = Location::firstWhere('slug',$data['location_slug']);
            unset($data['location_slug']);

            //Search the category
            $category = Category::firstWhere('name',$data['category']);
            unset($data['category']);

            $data['slug'] = Str::slug($data['title'],'-');
            $data['location_id'] = $location->id ?? null;
            $data['category_id'] = $category->id ?? null;
        }
        unset($data);

        //Insert data in the table
        DB::table('shows')->insert($shows);
    }
}

