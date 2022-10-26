<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\{Category, Subcategory};

class FrontPage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'image', 'category_id', 'subcategory_id', 'detail'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }
}
