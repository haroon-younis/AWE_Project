@extends('layout')

@section('title') Tag @endsection

@section('content')
    <div class="container">
        <h1>Tags</h1>
        
        @foreach($tags as $tag)
            <a href="/tags/{{$tag->id}}"><li class="list-group-item">{{$tag->name}} </li></a>
        @endforeach
    </div>
@endsection