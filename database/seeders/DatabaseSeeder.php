<?php

namespace Database\Seeders;

use App\Models\Locality;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            ArtistSeeder::class,
            TypeSeeder::class,
            LocalitySeeder::class,
        ]);

    }
}
