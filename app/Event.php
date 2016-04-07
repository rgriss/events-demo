<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $dates=['created_at','updated_at','date'];
    //

    public function attendees()
    {
        return $this->belongsToMany('App\User');
    }

    public function scopeFuture($query)
    {
        return $query->orderBy('date','asc')->where('date','>',date('Y-m-d'));
    }

    public function scopePast($query)
    {
        return $query->orderBy('date','desc')->where('date','<',date('Y-m-d'));
    }

    public function scopeToday($query)
    {
        return $query->where('date','=',date('Y-m-d'));
    }
}
