@extends('layout')

@section('title')
    Add a New Tag
@endsection

@section('content')

    <div class="container">
        <h1>Add a new tag</h1>
        
        <form method="POST" action=/tags>
          {{ csrf_field() }}  
          <div class="form-group">
            <label for="name">Make</label>
            <input name="name" type="text" class="form-control" id="carMake" aria-describedby="emailHelp" placeholder="Tag" required>
            <small id="emailHelp" class="form-text text-muted">Enter a tag in the box above</small>
          </div>
          <div class="form-group">
              <button type="submit" class="btn btn-primary">Add Tag</button>
          </div>
          
          @include('errors')
          
        </form>

        
    </div>
    
    
    
@endsection