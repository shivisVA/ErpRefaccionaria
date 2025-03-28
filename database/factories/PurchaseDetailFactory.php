<?php

namespace Database\Factories;

use App\Models\Purchase;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PurchaseDetail>
 */
class PurchaseDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $purchaseCount=Purchase::count();
        $productCount= Product::count();

        if($purchaseCount==0)
        {
            Purchase::factory()->create();
            $purchaseCount=1;
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
        $price=$product->cost;

        return [
            'purchase_id'=>fake()->numberBetween(1,$purchaseCount),
            'product_id'=>$productId,
            'cant'=>fake()->numberBetween(1,10),
            'unit_price'=>$price,
        ];
    }
}
