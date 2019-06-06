<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $fillable = ['name', 'category_id'];

    public function categories()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function subsubCategories()
    {
        return $this->hasMany('App\SubsubCategory', 'sub_category_id');
    }

    public function products()
    {
        return $this->hasMany('App\Product', 'sub_category_id');
    }
}
