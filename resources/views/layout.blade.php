<!doctype html>
<html lang="en">
	<head>
		<title>@yield('title', 'AWE Assignment Website')</title>
		<meta charset="utf-8" />
		<meta name="author" content="Haroon Younis" />
		<meta name="description" content="Laravel Assignment Project" />
		<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.css">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        
        <style>
		  .is-complete {
		      text-decoration: line-through;
		  }
		</style>
        
	</head>
	<body>
	
	<div class="container">
        <nav class="navbar navbar-expand-sm bg-dark">    
                <div class="navbar-header">
                    <a class="navbar-brand" href="/">AWE Project</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href={{ route('index') }}>Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href={{ route('about.index') }}>About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href={{ route('cars.index') }}>My Cars</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href={{ route('fav.index') }}>Favourites</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link"href={{ route('tags.index') }}>Tags</a>
                    </li>
                    @guest
                    <li class="nav-item">
                        <a class="nav-link"href={{ route('login') }}>Login</a>
                    </li>   
                        @else
                    <span class="alert alert-success">
                        <li class="nav-item">
                            <p>Logged in user: {{ Auth::user()->name }}</p>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                            </form>
                        </li>
                    </span>
                    @endguest
                    
                </ul>
            </div>
        </nav>
    </div>
    
		@yield('content')
		
		<script src="{{ asset('js/app.js') }}"></script>
	</body>
</html>