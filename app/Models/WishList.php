<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class WishList extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id','p_id','pimage'
    ];

    public function product() :BelongsTo
    {
        return $this->belongsTo(Product::class, 'p_id', 'id');
    }
}
