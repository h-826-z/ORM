<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
