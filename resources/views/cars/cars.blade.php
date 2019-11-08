@extends('layout')

@section('title')
    Cars
@endsection

@section('content')
    <div class="container">
        <h1>My Cars</h1>
        
    @include('session')
        
        <ul class="list-group">
            @foreach($car as $cars)
                <a href="/cars/{{$cars->id}}"<li class="list-group-item">{{$cars->make}} {{$cars->model}}<li></a>
            @endforeach
        </ul>
    </div>
    
    <div class="container">
        <h1><a href="cars/create/">Add new car</a></h1>
    </div>
    
    
    
@endsection