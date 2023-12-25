<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\city;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\city>
 */
class CityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
           's_id'=>fake()->numberBetween(1,5),
           'city_name'=>fake()->address(),
        ];
    }
}
