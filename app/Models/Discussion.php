<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;


class Discussion extends Model
{
    use HasFactory;

    protected $fillable = [
        'item', 'session', 'user', 'ven_id', 'user_name', 'email', 'review', 'comment'
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class, 'item', 'id');
    }
}
