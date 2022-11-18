<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Withdraw extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id','email','phone','amount','method','paypal',
        'payoneer','iban','bnk_name','other','status'
    ];
}
