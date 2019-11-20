@extends('layouts.app')

@section('title')
    Dashboard
@endsection

@section('content')

<div class="container">
    
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="alert alert-success" role="alert">
      You are logged in!
    </div>
    
    <ul>
        <li>
            <a href="/">Home</a>
        </li>
        <li>
            <a href="/about">About</a>
        </li>
        <li>
            <a href="/cars">My Cars</a>
        </li>
        <li>
            <a href="/favourites">Favourites</a>
        </li>
    </ul>
    
</div>
    
    
@endsection
