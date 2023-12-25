<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->name(),
            'age'=>fake()->numberBetween(0,100),
            'email'=>fake()->email(),
            'address'=>fake()->address(),
            'city'=>fake()->city(),
            'phone'=>fake()->phoneNumber(),
            'password'=>fake()->password()
        ];
    }
}
