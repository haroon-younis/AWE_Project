<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\FavCollection;

class Favourites extends Model
{
    protected $guarded = [];
    
    public function newCollection(array $models = [])
    {
        return new FavCollection($models);
    }
    
    public function owner()
    {
        return $this->belongsTo(User::class);
    }
    
    public function cars()
    {
        return $this->hasMany(Car::class);
    }

    
}
