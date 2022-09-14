<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AffiliateProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'admin_id','vendor_id','a_type','a_name','a_image','a_sku','a_link',
        'a_size_qnty','a_size_price','a_ship_time',
        'a_color','a_catog','a_sub_catog',
        'a_child_catog','a_new_price','a_old_price',
        'a_stock','a_detail','a_r_policy','a_small',
        'a_medium','a_large','a_status'
    ];
}
