<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $clientsCount=Client::count();

        if($clientsCount==0)
        {
            Client::factory()->create();
            $clientsCount=1;
        }
        return [
            'client_id'=>fake()->numberBetween(1,$clientsCount),
            'date'=>fake()->dateTimeBetween('-5 years', 'now'),
            'total'=>0,
            //
        ];
    }
}