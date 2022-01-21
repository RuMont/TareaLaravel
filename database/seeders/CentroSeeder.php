<?php

namespace Database\Seeders;

use App\Models\Centro;
use Illuminate\Database\Seeder;

class CentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Centro::factory()->times(10)->create();
    }
}
