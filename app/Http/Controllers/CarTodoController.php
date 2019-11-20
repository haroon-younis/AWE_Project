<?php

namespace AWE\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Notification;

use AWE\Notifications\CreatedTodo;
use AWE\Todo;
use AWE\Car;
use AWE\User;

class CarTodoController extends Controller
{
    public function store(Car $car)
    {
         
        $attributes = request()->validate(['description' =>'required']);
        
        $car->addTodo($attributes);
                
        $carOwner= $car->owner_id;
        
        $user = User::find($carOwner);
        
        $user->notify(new CreatedTodo($car));
                
        session()->flash('todo', 'You added a todo with the following descripton: '.request()->description);
        return back();
    }
    
    public function index(Todo $todo){
        $todos = Todo::all();
        
        //hitting the method inside the FavCollection 
        //$todo = $todos->blah();
        
        return view('todo', compact('todo'));
        
    }
}
