<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class PagesController extends Controller
{
    public function homePage(Car $cars){
        return view('pages.index', compact('cars'));
    }
    
    public function aboutPage(){
        return view('pages.about');
    }
}
