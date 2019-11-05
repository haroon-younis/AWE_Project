<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    
    public function todos()
   {
       return $this->hasMany(Todo::class);
   }
   
   public function addTodo($todo)
   {
       $this->todos()->create($todo);
   }
}
