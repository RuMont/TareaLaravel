<?php

namespace Database\Factories;

use App\Models\Centro;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dni' => $this->faker->numerify('########'),
            'name' => $this->faker->name(),
            'surname' => $this->faker->name(),
            'birth_date' => $this->faker->date('Y-m-d H:i:s'),
            'centre_id' => Centro::all()->random()->id,
            'created_at' => $this->faker->date('Y-m-d H:i:s'),
            'updated_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
