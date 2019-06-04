<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    protected $fillable = ['ean', 'discount_price', 'valid_until'];

    public function product()
    {
        return $this->belongsTo('App\Product', 'ean', 'ean');
    }
}
