<?php

namespace AWE\Http\Controllers;

use Illuminate\Http\Request;

use AWE\Todo;

class CompletedTodoController extends Controller
{
    public function store(Todo $todo)
    {
        $todo->complete();
        
        session()->flash('completed', 'You completed a todo with the following descripton: '.$todo->description);
        
        return back();
    }
    
    public function destroy(Todo $todo)
    {
        $todo->incomplete();
        
        return back();
 
    }

}
