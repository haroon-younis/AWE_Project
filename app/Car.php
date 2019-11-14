<?php

namespace App;

use App\Mail\CarAdded;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $guarded = [];
    /*
    protected static function boot()
    {
        parent::boot();
        
        static::created(function($car){
            Mail::to($car->owner->email)->send(
            new CarAdded($car)
        );
        });
    }
    */
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
