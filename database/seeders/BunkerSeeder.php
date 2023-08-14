<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class BunkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bunkers')->insert([
            'user_id' => 1,
            'tongkang_id' => 1,
            'kri_id' => 3,
            'bbm' => 'HSD',
            'bunker_location' => 'JICT 2',
            'start' => Carbon::now()->format('Y-m-d H:i:s'),
            'stop' => Carbon::now()->format('Y-m-d H:i:s'),
            'vol_lo' => 10000,
            'vol_ar' => 9990,
            'surveyor' => 'Hari Pranata',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
