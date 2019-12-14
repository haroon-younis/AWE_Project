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
                
        session()->flash('todo', 'You added a todo with the following descripton: '.request()->description);
        return back();
    }
    
    public function index(Todo $todo){
        //$todos = Todo::all();
        $user = User::find(1);

        //dd($user->notifications);
        foreach ($user->notifications as $notification) {
            dd($notification->data);
        }
        
        //hitting the method inside the FavCollection 
        //$todo = $todos->blah();
        
        return view('cars.todo', compact('todo'));
        
    }
    
}
