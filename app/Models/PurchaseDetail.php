<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class PurchaseDetail extends Model
{
    use HasFactory;

    protected $fillable=[
        'purchase_id',
        'product_id',
        'cant',
        'unit_price'
    ];

    public function purchase(): BelongsTo
    {
        return $this->belongsTo(Purchase::class);
    }

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
