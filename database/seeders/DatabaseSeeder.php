<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kri;
use App\Models\Tongkang;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            VesselSeeder::class,
            LoadingSeeder::class,
            BunkerSeeder::class,
            LoDetailSeeder::class,
        ]);
    }
}
