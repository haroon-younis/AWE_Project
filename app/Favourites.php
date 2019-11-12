<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FavCollection;

class Favourites extends Model
{
    protected $guarded = [];
    
    public function cars()
    {
        return $this->belongsTo(Car::class);
    }
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    
    public function newCollection(array $models = Array())
    {
        return new FavCollection($models);
    }
}
