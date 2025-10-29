<?php

namespace Database\Factories;

use App\Faker\Providers\BrPersonProvider;
use App\Models\Employee;
use App\Models\Group;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Group>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = $this->faker;
        $faker->addProvider(new BrPersonProvider($faker));

        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'cpf' => $faker->cpf(false),
        ];
    }
}
