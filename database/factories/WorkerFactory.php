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
            'worker_firstname'=>fake()->firstName(),
            'worker_middlename'=>fake()->firstName(),
            'worker_lastname'=>fake()->lastName(),
            'worker_address'=>fake()->address(),
            'worker_phone'=>fake()->phoneNumber(),
            'worker_email'=>fake()->email(),
            'worker_description'=>fake()->realText(),
            'worker_education'=>fake()->realText(),
            'worker_experience'=>fake()->realText(),
            'worker_category'=>fake()->realText(),
            'worker_skills'=>fake()->randomElement(['html,css','js','react','design','php']),
            'worker_birthday'=>fake()->date(),
            'worker_department'=>fake()->randomElement(['отдел разработки','отдел стажировки','медиа группа','координационный отдел']),
            'worker_car'=>fake()->randomElement([true,false]),
            'worker_laptop'=>fake()->randomElement([true,false]),


        ];
    }
}
