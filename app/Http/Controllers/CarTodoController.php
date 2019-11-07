<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Notification;

use App\Notifications\CreatedTodo;
use App\Todo;
use App\Car;
use App\User;

class CarTodoController extends Controller
{
    public function store(Car $car)
    {
         
        $attributes = request()->validate(['description' =>'required']);
        
        $car->addTodo($attributes);
        
        $carOwner= $car->owner_id;
        
        $user = User::find($carOwner);
        
        $user->notify(new CreatedTodo($car));
        
        //dd($car);
        
        return back();
    }
    

}
