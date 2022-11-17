<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\{Admin, PlanOrder};

class SubscriptionPlan extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title', 'staf_id', 'symbol', 'code', 'cost', 'days', 'limit','allowed_quantity', 'allowed_type','status', 'detail'
    ];

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'staf_id', 'id');
    }

    public function plan_order(){
        return $this->hasMany(PlanOrder::class, 'subscription_id');
    }
}
