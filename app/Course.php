<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public function posts()
    {
    	return $this->belongsToMany('App\Post')->withTimestamps();
    }

    public function teachers()
    {
    	return $this->belongsTo('App\Teacher');
    }
}
