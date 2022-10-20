<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Payment;
use App\Models\OrderDetail;


class Order extends Model
{
    use HasFactory;

    public function payment()
    {
        return $this->hasMany(Payment::class, 'order_id');
    }

    public function order_detail()
    {
        return $this->hasMany(OrderDetail::class, 'order_id');
    }
}
