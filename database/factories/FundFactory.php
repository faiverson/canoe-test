<?php

namespace Database\Factories;

use App\Models\Alias;
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
        return [
            'name' => fake()->company(),
            'start_year' => fake()->numberBetween(1980, 2023),
            'manager_id' => function () {
                return FundManager::factory()->create()->getKey();
            },
        ];
    }

    public function configure(): static
    {
        return $this->afterCreating(function (Fund $fund) {
            $fund->companies()->sync(
                Company::inRandomOrder()->take(fake()->randomElement([1,5]))->get()
            );
            $fund->aliases()->sync(
                Alias::inRandomOrder()->take(fake()->randomElement([1,5]))->get()
            );
        });
    }
}
