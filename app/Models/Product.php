<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\{Category, Subcategory, Childcategory, Admin, Vendor, Discussion, OrderDetail, RecentView, WishList, Gallery};
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
    public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class, 'vendor_id', 'id');
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class, 'admin_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'p_catog', 'id');
    }

    public function subcategory(): BelongsTo
    {
        return $this->belongsTo(Subcategory::class, 'p_sub_catog', 'id');
    }

    public function childcategory(): BelongsTo
    {
        return $this->belongsTo(Childcategory::class, 'p_child_catog', 'id');
    }

    public function orderdetail()
    {
        return $this->hasMany(OrderDetail::class, 'pro_id');
    }

    public function discussions(){
        return $this->hasMany(Discussion::class, 'item');
    }

    public function recentviews()
    {
        return $this->hasMany(RecentView::class, 'p_id');
    }

    public function wishlists()
    {
        return $this->hasMany(WishList::class, 'p_id');
    }

    public function cart()
    {
        return $this->hasMany(Cart::class, 'prod_id');
    }

    public function gallery()
    {
        return $this->hasMany(Gallery::class, 'product_id');
    }

}
