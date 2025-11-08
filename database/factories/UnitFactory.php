<?php

namespace Database\Factories;

use App\Faker\Providers\BrPersonProvider;
use App\Models\Group;
use App\Models\Unit;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Group>
 */
class UnitFactory extends Factory
{
    protected $model = Unit::class;

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
            'trade_name' => $this->faker->company,
            'legal_name' => $this->faker->company.' LTDA',
            'cnpj' => $faker->cnpj(false),
        ];
    }
}
