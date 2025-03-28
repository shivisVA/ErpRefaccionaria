<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Product;
use App\Models\Sale;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SaleDetail>
 */
class SaleDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $saleCount=Sale::count();
        $productCount= Product::count();

        if($saleCount==0)
        {
            Sale::factory()->create();
            $saleCount=1;
        }

        if($productCount==0)
        {
            $productId=Product::factory()->create()->id;
            $productCount=1;
        }
        else
        {
            $productId=fake()->numberBetween(1, $productCount);

        }

        $product=Product::find($productId);
        $price=$product->price;

        return [
            'sale_id'=>fake()->numberBetween(1,$saleCount),
            'product_id'=>$productId,
            'cant'=>fake()->numberBetween(1,10),
            'unit_price'=>$price,
        ];
    }
}
