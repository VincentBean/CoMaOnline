<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliverySlot extends Model
{
    protected $fillable = ['date'];

    public function time_slots()
    {
        return $this->hasMany('App\TimeSlot');
    }
}
