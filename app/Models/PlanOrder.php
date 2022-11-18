<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\{Vendor, SubscriptionPlan};

class PlanOrder extends Model
{
    use HasFactory;
    protected  $fillable = [
        'vendor_id', 'subscription_id', 'strip_customer_id', 'strip_charge_id', 'paid_amount', 
        'payment_status', 'receipt_url', 'paid_amount', 'remainig_days','expired_at', 
        'allowed_quantity', 'remaining_quantity', 'status'
    ];

    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function subscription_plan(): BelongsTo
    {
        return $this->belongsTo(SubscriptionPlan::class, 'subscription_id', 'id');
    }
}
