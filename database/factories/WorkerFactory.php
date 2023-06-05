<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Worker>
 */
class WorkerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worker_name'=>fake()->name(),
            'worker_address'=>fake()->address(),
            'worker_phone'=>fake()->phoneNumber(),
            'worker_email'=>fake()->email(),
            'worker_description'=>fake()->realText(),
            'worker_education'=>fake()->realText(),
            'worker_experience'=>fake()->realText(),
            'worker_skills'=>fake()->randomElement(['html,css','js','react','design','php']),
            'worker_birthday'=>fake()->date(),
            'worker_car'=>fake()->randomElement([true,false]),
            'worker_laptop'=>fake()->randomElement([true,false]),
            'worker_passport_seria' => fake()->numberBetween(1000,9999),
            'worker_passport_number' => fake()->numberBetween(100000,999999),
            'worker_passport_date' => fake()->date(),
            'worker_passport_organ' => fake()->company(),
            'worker_passport_code' => fake()->numberBetween(100000,999999),
            'worker_passport_term' => fake()->date(),
            'worker_passport_inn' => fake()->numberBetween(1000000000,999999999),
            'worker_passport_snils' => fake()->numberBetween(100000,999999)

        ];
    }
}
