@extends('layout')

@section('title')
    Add a New Car
@endsection

@section('content')

    <div class="container">
        <h1>Add a new car</h1>
        
        <form method="POST" action=/cars>
          {{ csrf_field() }}  
          <div class="form-group">
            <label for="make">Make</label>
            <input name="make" type="text" class="form-control" id="carMake" aria-describedby="emailHelp" placeholder="Make of car" required>
            <small id="emailHelp" class="form-text text-muted">Enter the make of your car in the box above</small>
          </div>
          <div class="form-group">
            <label for="model">Model</label>
            <input name="model" type="text" class="form-control" id="carModel" aria-describedby="emailHelp" placeholder="Model of car" required>
            <small id="emailHelp" class="form-text text-muted">Enter the model of your car in the box above</small>
          </div>
          <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" placeholder="Vehicle description" required></textarea>
          </div>
          <div class="form-group">
            <label for="tag">Tag</label>
              <select name="tag" class="form-control">
                <option></option>
                    @foreach($tags as $tag)
                        <option>{{$tag->id}}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                  <button type="submit" class="btn btn-primary">Add Car</button>
              </div>
          </div>
          @include('errors')
        </form>
        
        <div class="container">
            @foreach($tags as $tag)
                <h6>Tag: {{$tag->id}} = {{$tag->name}}</h6>
            @endforeach
        </div>
        
    </div>
    
    
    
@endsection