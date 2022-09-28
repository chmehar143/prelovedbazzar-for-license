<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;


class RecentView extends Model
{
    use HasFactory;
    protected $fillable = [
        'p_id','pname','pimage'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
