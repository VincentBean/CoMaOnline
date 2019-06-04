<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function products()
    {
        return $this->belongsToMany('App\Product');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'user_id', 'user_id');
    }
}
