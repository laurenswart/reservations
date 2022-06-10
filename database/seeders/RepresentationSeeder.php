<?php

namespace Database\Seeders;

use App\Models\Location;
use App\Models\Representation;
use App\Models\Show;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RepresentationSeeder extends Seeder
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
        Representation::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        
        //Define data
        $representations = [
            [
                'location_slug'=>'espace-delvaux-la-venerie',
                'show_slug'=>'ayiti',
                'when'=>'2022-10-12 13:30',
            ],
            [
                'location_slug'=>'dexia-art-center',
                'show_slug'=>'ayiti',
                'when'=>'2022-10-12 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'cible-mouvante',
                'when'=>'2022-10-02 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'ceci-nest-pas-un-chanteur-belge',
                'when'=>'2022-10-16 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'ceci-nest-pas-un-chanteur-belge',
                'when'=>'2022-06-15 20:30',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'ceci-nest-pas-un-chanteur-belge',
                'when'=>'2022-06-14 18:00',
            ],
            [
                'location_slug'=>null,
                'show_slug'=>'cible-mouvante',
                'when'=>'2022-06-25 13:00',
            ],
            [
                'location_slug'=>'dexia-art-center',
                'show_slug'=>'ayiti',
                'when'=>'2022-06-05 16:30',
            ],
            [
                'location_slug'=>'espace-delvaux-la-venerie',
                'show_slug'=>'ayiti',
                'when'=>'2022-06-06 20:30',
            ],
            [
                'location_slug'=>'espace-delvaux-la-venerie',
                'show_slug'=>'promising-young-woman',
                'when'=>'2022-06-05 20:30',
            ],
            [
                'location_slug'=>'espace-delvaux-la-venerie',
                'show_slug'=>'promising-young-woman',
                'when'=>'2022-06-28 22:00',
            ],
            [
                'location_slug'=>'dexia-art-center',
                'show_slug'=>'promising-young-woman',
                'when'=>'2022-06-14 16:30',
            ],
            [
                'location_slug'=>'dexia-art-center',
                'show_slug'=>'cezanne',
                'when'=>'2022-06-06 20:30',
            ],
            [
                'location_slug'=>'dexia-art-center',
                'show_slug'=>'cezanne',
                'when'=>'2022-06-14 16:30',
            ],
        ];
        
        //Prepare the data
        foreach ($representations as &$data) {
            //Search the location for a given location's slug
            $location = Location::firstWhere('slug',$data['location_slug']);
            unset($data['location_slug']);

            //Search the show for a given show's slug
            $show = Show::firstWhere('slug',$data['show_slug']);
            unset($data['show_slug']);
            
            $data['location_id'] = $location->id ?? null;
            $data['show_id'] = $show->id;
        }
        unset($data);

        //Insert data in the table
        DB::table('representations')->insert($representations);
    }
      
}
