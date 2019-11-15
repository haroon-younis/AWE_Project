@extends('layout')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col">
                <h1>MAKE FILTER SO CARS CAN BE FILERTED BY TYPE $car->tags</h1>
                <h1>Welcome</h1>
                
            </div>
        <div class="col">
            <p>pass data through to views here</p>
            
            <ul class="list-group">
                @foreach ($cars as $car)
                    <li class="list-group-item">{{  $car  }}</li>
                @endforeach
            </ul>
            
        </div>
    </div>
    
@endsection