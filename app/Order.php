<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['time_slot_id', 'payment_type', 'price'];

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('quantity');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer', 'user_id', 'user_id');
    }

    public function time_slot()
    {
        return $this->belongsTo('App\TimeSlot');
    }
}
