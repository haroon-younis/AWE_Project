<?php

namespace App\Http\Controllers;

use App\Favourites;
use App\Car;
use Illuminate\Http\Request;
use Session;

class FavouritesController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Favourites $favourites)
    {
        //$favourites = Favourites::all();
        
        $favourites = Favourites::where('owner_id', auth()->id())->get();
        
        $favourites->returnUserFav(); // get favourites from custom collection class
        
        //dd($favourites);
        return view('fav.fav', compact('favourites'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return request()->all();
        
        $attributes =  request()->validate([
            'make' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'description' => ['required', 'min:3', 'max:255']
        ]);
        
        $attributes['owner_id'] = auth()->id();
        
        //return $attributes;
        
        Session::push('car', $attributes);
        //dd(session()->all());


        $favourites = Favourites::create($attributes);
        
        return redirect ('favourites');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Favourites  $favourites
     * @return \Illuminate\Http\Response
     */
    public function show(Favourites $favourites)
    {
        return view('fav.show_fav', compact('favourites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Favourites  $favourites
     * @return \Illuminate\Http\Response
     */
    public function edit(Favourites $favourites)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Favourites  $favourites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Favourites $favourites)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Favourites  $favourites
     * @return \Illuminate\Http\Response
     */
    public function destroy(Favourites $favourites)
    {
        //$this->authorize('update', $favourites);
        
        
        
        $favourites->delete();   
        
        return redirect('favourites');
    }
}
