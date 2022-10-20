<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Subcategory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','slug','status'];

    public function product(){
        return $this->hasMany(Product::class, p_catog);
    }

    public function subcategory(){
        return $this->hasMany(Subcategory::class);
    }

}
