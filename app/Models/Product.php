<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Chilcategory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'vendor_id','p_name','p_image','p_sku',
        'p_size_qnty','p_size_price','p_ship_time',
        'p_color','p_catog','p_sub_catog',
        'p_child_catog','p_new_price','p_old_price',
        'p_stock','p_detail','p_r_policy','small',
        'medium','large','status'
    ];
    public function vendor()
    {
        return $this->belongsTo(Vendor::class);
    }

}
