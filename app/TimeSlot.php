<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    protected $fillable = ['delivery_slot_id', 'start_time', 'end_time', 'price'];

    public function delivery_slot()
    {
        return $this->belongsTo('App\DeliverySlot');
    }

    public function getFullTime()
    {
        return $this->start_time . "-" . $this->end_time;
    }
}
