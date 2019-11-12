@extends('layout')

@section('title')
    Favourites
@endsection

@section('content')
    <div class="container">
        <h3>Favourites</h3>
        
        @foreach($favourites as $favourite)
            <a href="/favourites/{{$favourite->id}}"><li class="list-group-item">{{$favourite->make}} {{$favourite->model}}</li></a>
        @endforeach
    </div>
    
    
    
@endsection