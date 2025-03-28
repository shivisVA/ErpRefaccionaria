<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class SaleDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'sale_id',
        'product_id',
        'cant',
        'unit_price',
        
    ];

    public function sale():BelongsTo
    {
        return $this->belongsTo(Sale::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class); 
    }
}
