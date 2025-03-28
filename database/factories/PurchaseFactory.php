<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Provider;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Purchase>
 */
class PurchaseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $providersCount=Provider::count();

        if($providersCount==0)
        {
            Provider::factory()->create();
            $providersCount=1;
        }

        return [
        'provider_id'=>fake()->numberBetween(1, $providersCount),
        'date'=>fake()->dateTimeBetween('-5 years', 'now'),
        'total'=>fake()->randomFloat(2,10000,100000),
        ];
    }
}
