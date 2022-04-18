<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('facilities')->delete();
        DB::table('facilities')->insert([
            [
                'name' => 'Kolam Renang',
                'image' => 'section2.jpg',
                'description' => 'Kolam renang outdoor dengan pemandangan memukau yang dapat memanjakan mata. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Culpa, aliquid.',
            ],
            [
                'name' => "Kid's Club",
                'image' => 'playground.jpg',
                'description' => "Kid's Club yang luas menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi kenyamanan keluarga.",
            ],
            [
                'name' => 'Convention Center',
                'image' => 'convention.jpg',
                'description' => 'Convention Center kami, dilengkapi pelayanan lengkap dengan ruang konvensi terbesar di Bandung, mampu mengakomodasi hingga 3.000 delegasi. Manfaatkan ruang penyelenggara konversi M.I.C.E ataupun mewujudkan acara pernikahan adat yang mewah.',
            ],
        ]);
    }
}
