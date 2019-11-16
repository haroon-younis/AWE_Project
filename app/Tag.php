<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $guarded = [];
    
    public function cars()
    {
        return $this->belongsToMany(Car::class)->withTimestamps();
    }
}
