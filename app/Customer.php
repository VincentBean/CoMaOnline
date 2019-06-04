<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['user_id', 'name', 'surname', 'gender', 'phone', 'street_name', 'house_number', 'zipcode', 'city', 'province'];

    public function fullName()
    {
        $customer = Customer::findOrFail($this->id);

        if ($customer !== null) {
            return $customer->name . " " . $customer->surname;
        }

    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'user_id', 'user_id');
    }
}
