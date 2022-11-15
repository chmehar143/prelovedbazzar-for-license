<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionPlan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'staf_id', 'symbol', 'code', 'cost', 'days', 'limit','allowed_quantity', 'allowed_type','status', 'detail'
    ];
}
