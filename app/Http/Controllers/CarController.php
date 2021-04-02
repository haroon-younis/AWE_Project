<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use App\Tag;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Mail\CarAdded as CarAddedMail;
use App\Events\CarAdded;
use Illuminate\Support\Facades\DB;

class CarController extends Controller
{
    public function __construct() {
        $this->middleware('auth'); // only a logged in user can access the car pages
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Car $car)
    {
        $car = Car::where('owner_id', auth()->id())->get();

        $tags = Tag::all();

        return view('cars.cars', compact('car', 'tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        return view('cars.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $attributes =  request()->validate([
            'make' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'description' => ['required', 'min:3', 'max:255']
        ]);

        $attributes['owner_id'] = auth()->id();

        $tag = request()->get('tag');

        $car = Car::create($attributes);

        $car->tags()->attach($tag);

        session()->flash('added', 'You have added a new car!');

        event(new CarAdded($car)); // fires an event which sends an email to user

        return redirect ('cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        if (\Gate::denies('update', $car)){
            abort(403, "You do not have access to this car");
        }

        $tag = $car->tags->pluck('name');

        return view('cars/show', compact('car', 'tag'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view('cars.edit', compact('car'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Car $car)
    {
        $this->authorize('update', $car);

        $attributes =  request()->validate([
            'make' => ['required', 'max:255'],
            'model' => ['required', 'max:255'],
            'description' => ['required', 'min:3', 'max:255']
        ]);

        $car->update($attributes);

        session()->flash('edited', 'You edited the following car: '.$car->make.' '.$car->model);

        return redirect('cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $this->authorize('update', $car);

        $car->delete();

        session()->flash('deleted', 'You deleted the following car: '.$car->make.' '.$car->model);
        return redirect('cars');
    }

    public function mail(Car $car)
    {
        return new CarAddedMail($car);
    }
}
