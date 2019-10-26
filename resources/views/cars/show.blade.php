@extends('layout')

@section('title')
    {{$car->make}} {{$car->model}}
@endsection

@section('content')
    <div class="container">
        <h1>{{$car->make}} {{$car->model}}</h1>
        <p>{{$car->description}}</p>
        
        <a class="btn btn-warning btn-lg" href="/cars/{{$car->id}}/edit">Edit</a>
    </div>
    
    <div class="container">
        <a class="btn btn-primary btn-lg" href="/cars">Back</a>
    </div>
    
    @if($car->todos->count())
        <div class="container">
            <div class="box">
                <h1>TODO Section</h1>
                @foreach($car->todos as $todo)
                
                    <form method="POST" action="/completed-todos/{{$todo->id}}">
                      @if($todo->completed)
                        {{method_field('DELETE')}}
                      @endif
                      {{ csrf_field() }}    
                        <div class="form-check">
                            <input name="completed" type="checkbox" class="form-check-input" id="exampleCheck1" onChange="this.form.submit()" {{$todo->completed ? 'checked' : ''}}>
                            <label for="completed" class="form-check-label {{ $todo->completed ? 'is-complete' : ''}}" for="exampleCheck1" >
                                {{$todo->description}}
                            </label>
                         </div>
                    </form>
                @endforeach
            </div>
        </div>
    @endif
    
    <div class="container">
        <form method="POST" class="box"action="/car/{{$car->id}}/todos">
              {{ csrf_field() }}  
              <div class="form-group">
                <label for="new_task">New Todo</label>
                <input name="description" type="text" class="form-control" id="carMake" placeholder="Enter new item todo" required>
                <small id="emailHelp" class="form-text text-muted">Enter a new item todo</small>
              </div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary">Add Todo</button>
              </div>
              
              @include('errors')
              
            </form>
        </div>
    
    
    
@endsection