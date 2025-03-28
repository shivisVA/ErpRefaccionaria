<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;



class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'price',
        'cost',
        'category_id',
        'provider_id',
        'stock',
    ];

    public function provider(): BelongsTo
    {
        return $this->BelongsTo(Provider::class);
    }

    public function category(): BelongsTo
    {
        return $this->BelongsTo(Category::class);
    }

   
}
