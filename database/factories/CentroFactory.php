<?php

namespace Database\Factories;

use App\Models\Centro;
use Illuminate\Database\Eloquent\Factories\Factory;

class CentroFactory extends Factory{

    protected $model = Centro::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Devolvemos datos inventados para nuestras columnas

            'city' => $this->faker->name(),
            'name' => $this->faker->name()
        ];
    }
}
