<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanOrder extends Model
{
    use HasFactory;
    protected  $fillable = [
        'vendor_id', 'subscription_id', 'strip_customer_id', 'paid_amount', 
        'payment_status', 'receipt_url', 'paid_amount', 'remainig_days', 
        'allowed_quantity', 'remaining_quantity', 'status'
    ];
}
