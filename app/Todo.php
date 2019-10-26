<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $guarded = [];
    
    public function cars()
    {
        return $this->belongsTo(Car::class);
    } 
    
    public function complete($completed = true)
    {
        $this->update(compact('completed'));
    }
    
    public function incomplete(){
        $this->complete(false);
    }
}
