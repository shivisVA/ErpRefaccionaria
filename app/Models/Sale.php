<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    use HasFactory;

    protected $fillable=[
        'client_id',
        'date',
        'total',
    ];

    function client():BelongsTo
    {
        return $this->belongsTo(Client::class);
    }

    function saleDetails():HasMany
    {
        return $this->hasMany(SaleDetail::class);
    }
}
