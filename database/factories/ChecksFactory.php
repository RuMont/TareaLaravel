<?php

namespace Database\Factories;

use App\Models\Checks;
use App\Models\Users;
use Illuminate\Database\Eloquent\Factories\Factory;

class ChecksFactory extends Factory
{
    protected $model = Checks::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => $this->faker->numerify('##'),
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s'),
            'user_id' => Users::all()->random()->id
        ];
    }
}
