<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['ean', 'title', 'brand', 'short_description', 'full_description', 'image_url', 'weight', 'price', 'subcategory', 'subsubcategory'];

    public function categories()
    {
        return $this->belongsToMany('App\Category', 'product_category')->withTimestamps();
    }
}
