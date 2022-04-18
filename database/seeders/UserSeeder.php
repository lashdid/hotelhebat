<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('users')->insert([
            [
                'name' => 'alhan',
                'type' => 'admin',
                'email' => 'alhan.admin@email.com',
                'password' => bcrypt('password'),
            ],
            [
                'name' => 'alhan',
                'type' => 'resepsionis',
                'email' => 'alhan.resepsionis@email.com',
                'password' => bcrypt('password'),
            ],
        ]);
    }
}
