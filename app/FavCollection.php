<?php

namespace App;

use Illuminate\Database\Eloquent\Collection;
use App\Favourites;

class FavCollection extends Collection
{
    public function returnUserFav()
    {
        // returns collection of favourites that is linked to the user
       return $this->filter(function ($favourites) {
           $favourites = Favourites::all();
           $favourites->pluck('owner_id', auth()->id());
           
           //$favourites = Favourites::where('owner_id', auth()->id())->get();
            return $favourites;
        });
        
    }
    
    public function everything()
   {
       return Favourites::all();
   }
}
