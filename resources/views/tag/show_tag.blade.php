@extends('layout')

@section('title')
    Tags
@endsection

@section('content')
    <div class="container">
        
        <h1 class="display-4">{{$tag->name}}</h1>
        
    </div>
    
    
    <div class="container">
        <a class="btn btn-primary btn-lg" href="/tags">Back</a>
    </div>
    
    <div class="container">
        <form method="POST" action=/tags/{{ $tag->id }}>
        {{method_field('DELETE')}}
        {{ csrf_field() }}  
        <div class="form-group">
        <button type="submit" class="btn btn-danger">Delete Car from Favourites</button>
        </div>
        </form>
    </div>
    
    
    
@endsection