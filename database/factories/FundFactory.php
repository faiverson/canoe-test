<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Fund;
use App\Models\FundManager;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Fund>
 */
class FundFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $words = [fake()->word(), fake()->word(), fake()->word(), fake()->word(), fake()->word()];
        return [
            'name' => fake()->company(),
            'start_year' => fake()->numberBetween(1980, 2023),
            'manager_id' => function () {
                return FundManager::factory()->create()->getKey();
            },
            'aliases' => fake()->boolean() ? fake()->randomElements($words, fake()->numberBetween(1,5)) : null,
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Fund $fund) {
            $fund->companies()->sync(
                Company::inRandomOrder()->take(fake()->randomElement([1,5]))->get()
            );
        });
    }
}
