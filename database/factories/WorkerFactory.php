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


        ];
    }
}
