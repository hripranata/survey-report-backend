<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class VesselSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vessels')->insert([
            'vessel_name' => 'SPOB Kujang Jaya 1',
            'vessel_type' => 'SPOB',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('vessels')->insert([
            'vessel_name' => 'SPOB Kanaya Indah 99',
            'vessel_type' => 'SPOB',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('vessels')->insert([
            'vessel_name' => 'KRI Bung Tomo 357',
            'vessel_type' => 'KRI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('vessels')->insert([
            'vessel_name' => 'KRI John Lie 358',
            'vessel_type' => 'KRI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('vessels')->insert([
            'vessel_name' => 'KRI Usman Harun 359',
            'vessel_type' => 'KRI',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
