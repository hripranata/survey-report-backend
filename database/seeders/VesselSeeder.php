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
        $vessel_list = [
            ['vessel_name' => 'SPOB Kujang Jaya 1', 'vessel_type' => 'SPOB', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'SPOB Kanaya Indah 99', 'vessel_type' => 'SPOB', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Bung Tomo 357', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI John Lie 358', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Usman Harun 359', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Raden Eddy Martadinata 331', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI I Gusti Ngurah Rai 332', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Diponegoro 365', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sultan Haanudin 366', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sultan Iskandar Muda 367', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Frans Kaisepo 368', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Karel Satsuit Tubun (356)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Kapitan Patimura (371)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Cut Nyak Dien (375)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sultan Thaha Syaifuddin (376)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sutanto (377)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sutedi Senoputra (378)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Wiratno (379)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Tjiptadi (381)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Imam Bonjol (383)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teuku Umar (385)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Silas Papare (386)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Clurit (641)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Kujang (642)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Beladau (643)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Alamang (644)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Surik (645)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Siwar (646)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Parang (647)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Terapang (648)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Mandau (621)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Badik (623)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Keris (624)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Kerambit (627)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sampari (628)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Tombak (629)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Halasan (630)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Barakuda (814)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Todak (631)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Lemadang (632)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Kobra (867)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sembilang (850)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Sikuda (863)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Tenggiri (865)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Cucut (886)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Dewaruci', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Bimasuci', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Makassar (590)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Surabaya (591)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Banjarmasin (592)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Banda Aceh (593)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI DR Soeharso (990)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Gilimanuk (531)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Celukan Bawang (532)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Sibolga (536)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Hading (538)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Parigi (539)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Lampung (540)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Jakarta (541)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Cirebon (543)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Sabang (544)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Kendari (518)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Kupang (519)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Bintuni (520)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Lada (521)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Youtefa (522)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Palu (523)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Calang (524)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Pulau Romang (723)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Kelabang (826)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Kala Hitam (828)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Leuser (924)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Dewa Kembar (932)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Rigel (933)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Spica (934)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')],
            ['vessel_name' => 'KRI Teluk Mentawai (959)', 'vessel_type' => 'KRI', 'created_at' => Carbon::now()->format('Y-m-d H:i:s'), 'updated_at' => Carbon::now()->format('Y-m-d H:i:s')]
        ];

        DB::table('vessels')->insert($vessel_list);
    }
}

