<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\FrontPage;

class Subcategory extends Model
{
    use HasFactory;
    protected $fillable = ['category_id','name','slug','status'];

    public function category()
    {
        return $this->belongsTo('App\Models\Category')->withDefault(function ($data) {
            foreach($data->getFillable() as $dt){
                $data[$dt] = __('Deleted');
            }
        });
    }
    public function forntpages(){
        return $this->hasMany(FrontPage::class, 'category_id');
    }
}
