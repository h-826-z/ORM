<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'name','position_id', 'email', 'salary','description'
    ];
    
    public function position()
    {
        return $this->belongsTo('App\Position');
    }
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
