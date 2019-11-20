<?php

namespace AWE;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    
    public function cars()
    {
        return $this->belongsToMany(Car::class)->withTimestamps();
    }
    
    public function getRouteKeyName()
    {
        return 'name';
    }
}
