<?php

namespace App;

use App\Mail\CarAdded;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;

class Car extends Model
{
    use Notifiable;
    
    protected $guarded = [];
    
    public static function boot()
    {
        parent::boot();
        /*
        static::created(function($car){
            Mail::to($car->owner->email)->send(
            new CarAdded($car)
        );
        });
        */
       
       static::updating(function($car)
       {
           $car->change(auth()->id());
       });
       
    }
    
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
   
   public function tags()
   {
       return $this->belongsToMany(Tag::class)->withTimestamps();
   }
   
   public function changes()
   {
       return $this->belongsToMany(User::class, 'changes')
                ->withTimestamps()
                ->withPivot(['before', 'after'])
                ->latest('pivot_updated_at');
   }
   
   public function change($userId, $diff = null)
   {
       $userId = $userId;
       $diff = $diff ?: $this->getDiff();
       
       $changed = $this->getDirty();
       
       return $this->changes()->attach($userId, $diff);
   }
   
   protected function getDiff()
   {
       $changed = $this->getDirty();
       
       $before = json_encode(array_intersect_key($this->fresh()->toArray(), $changed));
       $after = json_encode($changed);
       
       return compact('before', 'after');
       
   }

}
