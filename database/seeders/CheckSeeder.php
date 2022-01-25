<?php

namespace Database\Seeders;
use App\Models\Checks;
use Illuminate\Database\Seeder;

class CheckSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Checks::factory()->times(10)->create();
    }
}
