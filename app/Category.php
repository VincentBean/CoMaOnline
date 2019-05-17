<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    public function products()
    {
        return $this->hasMany('App\Product', 'category_id');
    }

    public function subCategories()
    {
        return $this->hasMany('App\SubCategory', 'category_id');
    }

    public function getNameAttribute($value)
    {
        return ucwords($value);
    }
}
