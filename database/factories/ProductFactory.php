<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryCount=Category::count();
        $providerCount=Provider::count();

        if($categoryCount==0)
        {
            Category::factory()->create();
            $categoryCount=1;
        }

        if($providerCount==0)
        {
            Provider::factory()->create();
            $providerCount=1;
        }
        return [
            'name'=>$this->faker->word(),
            'description'=>$this->faker->sentence(),
            'price'=>$this->faker->randomFloat(2,100,10000),
            'cost'=>$this->faker->randomFloat(2,100,10000),
            'category_id'=>$this->faker->numberBetween(1, $categoryCount),
            'provider_id'=>$this->faker->numberBetween(1, $providerCount),
            'stock'=>0,
            //
        ];
    }
}
