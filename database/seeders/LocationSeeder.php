<?php

namespace Database\Seeders;

use App\Models\Locality;
use App\Models\Location;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class LocationSeeder extends Seeder
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
        Location::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        

        //Define data
        $locations = [
            [
                'slug'=>null,
                'designation'=>'Espace Delvaux / La Vénerie',
                'address'=>'3 rue Gratès',
                'locality_postal_code'=>'1170',
                'website'=>'https://www.lavenerie.be',
                'phone'=>'+32 (0)2/663.85.50',
            ],
            [
                'slug'=>null,
                'designation'=>'Dexia Art Center',
                'address'=>'50 rue de l\'Ecuyer',
                'locality_postal_code'=>'1000',
                'website'=>null,
                'phone'=>null,
            ],
            [
                'slug'=>null,
                'designation'=>'La Samaritaine',
                'address'=>'16 rue de la samaritaine',
                'locality_postal_code'=>'1000',
                'website'=>'http://www.lasamaritaine.be/',
                'phone'=>null,
            ],
            [
                'slug'=>null,
                'designation'=>'Espace Magh',
                'address'=>'17 rue du Poinçon',
                'locality_postal_code'=>'1000',
                'website'=>'http://www.espacemagh.be',
                'phone'=>'+32 (0)2/274.05.10',
            ],
        ];
        
        //Insert data in the table
        foreach ($locations as &$data) {
	       //Recherche de la localité correspondant au code postal
            $locality = Locality::firstWhere('postal_code',$data['locality_postal_code']);
            unset($data['locality_postal_code']);

            $data['slug'] = Str::slug($data['designation'],'-');
            $data['locality_id'] = $locality->id;	//Référence à la table localities
        }

        DB::table('locations')->insert($locations);
    }
}
