<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;
use App\Car;

class CarTodoController extends Controller
{
    public function store(Car $car)
    {
        $attributes = request()->validate(['description' =>'required']);
        
        $car->addTodo($attributes);
        
        return back();
    }
    

}
