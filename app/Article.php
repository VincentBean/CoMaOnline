<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = ['user_id', 'title', 'slug', 'sub_title', 'category', 'description', 'header_img_url'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function dateNumber()
    {
        $date = strtotime($this->created_at);

        return date('d', $date);
    }

    public function dateMonth()
    {
        $date = strtotime($this->created_at);

        return date('M', $date);
    }

    public function shortDescription()
    {
        if (strlen($this->description) > 100) {
            return strip_tags(substr($this->description, 0, 100)) . '...';
        } else {
            return $this->description;
        }
    }

    public function getRouteKeyName()
    {
        //We define our route name here so it will look into the database for the slug and return our model
        //Assuming the slugs are unique that is..
        return 'slug';
    }
}
