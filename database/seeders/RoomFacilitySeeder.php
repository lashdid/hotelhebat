<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_facilities')->delete();
        DB::table('room_facilities')->insert([
            [
                'type' => 'Superior',
                'name' => 'Kamar mandi shower',
            ],
            [
                'type' => 'Superior',
                'name' => 'Coffe Maker',
            ],
            [
                'type' => 'Superior',
                'name' => 'AC',
            ],
            [
                'type' => 'Superior',
                'name' => 'LED TV 32 inch',
            ],
            [
                'type' => 'Deluxe',
                'name' => 'Kamar mandi shower',
            ],
            [
                'type' => 'Deluxe',
                'name' => 'Bath Tub',
            ],
            [
                'type' => 'Deluxe',
                'name' => 'Coffe Maker',
            ],
            [
                'type' => 'Deluxe',
                'name' => 'Sofa',
            ],
            [
                'type' => 'Deluxe',
                'name' => 'AC',
            ],
            [
                'type' => 'Deluxe',
                'name' => 'LED TV 40 inch',
            ],
        ]);
    }
}
