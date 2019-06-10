<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['category_id', 'sub_category_id', 'subsub_category_id', 'ean', 'title', 'brand', 'short_description',
        'full_description', 'image_url', 'weight', 'price'];

    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function getShortDescriptionAttribute($value)
    {
        if (strlen($value) > 50) {
            return substr($value, 0, 50) . '...';
        } else {
            return $value;
        }
    }

    public function promotion()
    {
        return $this->hasOne('App\Promotion', 'ean', 'ean');
    }

    public function orders()
    {
        return $this->belongsToMany('App\Order')->withPivot('quantity');
    }
}
