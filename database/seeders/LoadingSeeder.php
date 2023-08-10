<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LoadingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('loadings')->insert([
            'user_id' => 1,
            'lo_date' => Carbon::now()->toDateString(),
            'tongkang' => 'SPOB Kujang Jaya 1',
            'bbm' => 'HSD',
            'start' => Carbon::now()->format('Y-m-d H:i:s'),
            'stop' => Carbon::now()->format('Y-m-d H:i:s'),
            'vol_lo' => 10000,
            'vol_al' => 9990,
            'surveyor' => 'Bayu Hariyanto',
        ]);

        DB::table('loadings')->insert([
            'user_id' => 2,
            'lo_date' => Carbon::now()->toDateString(),
            'tongkang' => 'SPOB Kanaya Indah 99',
            'bbm' => 'HSD',
            'start' => Carbon::now()->format('Y-m-d H:i:s'),
            'stop' => Carbon::now()->format('Y-m-d H:i:s'),
            'vol_lo' => 50000,
            'vol_al' => 49985,
            'surveyor' => 'Hari Pranata',
        ]);
    }
}
