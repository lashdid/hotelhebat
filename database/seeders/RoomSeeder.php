<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->delete();
        DB::table('rooms')->insert([
            [
                'type' => 'Superior',
                'image' => 'room1.jpg',
                'amount' => 50,
                'size' => 32
            ],
            [
                'type' => 'Deluxe',
                'image' => 'room2.jpg',
                'amount' => 50,
                'size' => 45
            ]
        ]);
    }
}
