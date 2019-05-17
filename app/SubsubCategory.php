<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubsubCategory extends Model
{
    protected $fillable = ['name', 'sub_category_id'];

    public function sub_categories()
    {
        return $this->belongsTo('App\SubCategory', 'sub_category_id');
    }
}
