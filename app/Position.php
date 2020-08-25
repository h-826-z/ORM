<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable=[
        'position_name','department_id'
    ];
    public function department()
    {
        return $this->belongsTo('App\Department');
    }
    public function employees()
    {
        return $this->hasMany('App\Employee');
    }
}
