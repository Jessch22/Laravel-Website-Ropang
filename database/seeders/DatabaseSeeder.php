<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ContactSeeder::class,
            ReservationSeeder::class,
            UserSeeder::class,
            MenuSeeder::class
        ]);
    }
}
