<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CentroSeeder::class);
        $this->call(UsersSeeder::class);
        $this->call(CheckSeeder::class);
    }
}
