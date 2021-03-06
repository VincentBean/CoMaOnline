<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];

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

    public function getRouteKeyName()
    {
        //We define our route name here so it will look into the database for the slug and return our model
        //Assuming the slugs are unique that is..
        return 'slug';
    }
}
