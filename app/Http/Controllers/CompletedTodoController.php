<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todo;

class CompletedTodoController extends Controller
{
    public function store(Todo $todo)
    {
        $todo->complete();
        
        return back();
    }
    
    public function destroy(Todo $todo)
    {
        $todo->incomplete();
        
        return back();
 
    }

}
