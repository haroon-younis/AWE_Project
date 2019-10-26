@extends('layout')

@section('title')
    Edit a Car
@endsection

@section('content')
    <div class="container">
        <h1>edit</h1>
        
        <form method="POST" action=/cars/{{ $car->id }}>
          {{method_field('PATCH')}}
          {{ csrf_field() }}  
          <div class="form-group">
            <label for="make">Make</label>
            <input name="make" type="text" class="form-control" id="carMake" aria-describedby="emailHelp" placeholder="Make of car" value="{{ $car->make }}" required>
            <small id="emailHelp" class="form-text text-muted">Enter the make of your car in the box above</small>
          </div>
          <div class="form-group">
            <label for="model">Model</label>
            <input name="model" type="text" class="form-control" id="carModel" aria-describedby="emailHelp" placeholder="Model of car" value="{{ $car->model }}" required>
            <small id="emailHelp" class="form-text text-muted">Enter the model of your car in the box above</small>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Vehicle description" required>{{ $car->description }}</textarea>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Edit Car</button>
          </div>
          </form>
          
          <form method="POST" action=/cars/{{ $car->id }}>
            {{method_field('DELETE')}}
            {{ csrf_field() }}  
            <div class="form-group">
              <button type="submit" class="btn btn-danger">Delete Car</button>
          </div>
          </form>
    </div>
    
    
@endsection