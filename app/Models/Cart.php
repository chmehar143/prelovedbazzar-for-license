<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;
    protected $fillable = [
        'prod_id', 'user_id', 'quantity', 'price', 'net_price', 'size', 'color', 'session_id', 
    ];

    public function products(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id', 'id');
    }
}
