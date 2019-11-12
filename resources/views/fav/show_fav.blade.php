@extends('layout')

@section('title')
    insert title here
@endsection

@section('content')
    <div class="container">
        
        <h1 class="display-4">{{$favourites->make}} {{$favourites->model}}</h1>
        <p class="lead">{{$favourites->description}}</p>
        
    </div>
    
    
    <div class="container">
        <a class="btn btn-primary btn-lg" href="/favourites">Back</a>
    </div>
    
    <div class="container">
        <form method="POST" action=/favourites/{{ $favourites->id }}>
        {{method_field('DELETE')}}
        {{ csrf_field() }}  
        <div class="form-group">
        <button type="submit" class="btn btn-danger">Delete Car from Favourites</button>
        </div>
        </form>
    </div>
    
    
    
@endsection