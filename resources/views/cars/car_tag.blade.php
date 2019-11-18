@extends('layout')

@section('title')
    Cars
@endsection

@section('content')
    <div class="container">
        <h1>Filtered cars</h1>
        <ul class="list-group">
            @foreach($car as $cars)
                <a href="/cars/{{$cars->id}}"><li class="list-group-item">{{$cars->make}} {{$cars->model}}</li></a>
            @endforeach
        </ul>
        
    </div>
@endsection