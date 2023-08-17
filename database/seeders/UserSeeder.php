<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Hari Pranata',
            'nik' => '2962463',
            'email' => 'hripranata@gmail.com',
            'password' => Hash::make('password1'),
            'role' => 'admin',
            'phone' => '085870052142',
            'address' => 'Magelang',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        DB::table('users')->insert([
            'name' => 'Bayu Hariyanto',
            'nik' => '2962448',
            'email' => 'bayuhariyanto@gmail.com',
            'password' => Hash::make('password2'),
            'role' => 'user',
            'phone' => '085808237485',
            'address' => 'Jakarta',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
