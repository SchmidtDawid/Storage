<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">

	<title>Master</title>

	<!-- Styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy"
	 crossorigin="anonymous">
	<link href="{{URL::asset('styles.css')}}" rel="stylesheet">

</head>

<body id="app-layout">
	<div class="wrapper">
	<nav class="navbar navbar-expand-lg">
		<a class="navbar-brand" href="{{ route('home') }}">Magazyn</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
		 aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active">
					<a class="nav-link" href="{{ route('home') }}">Główna
						<span class="sr-only">(current)</span>
					</a>
				</li>
			</ul>
			<ul class="nav navbar-dark navbar-right">
				<!-- Authentication Links -->
				@guest
					<li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Logowanie</a></li>
					<li class="nav-item"><a class="nav-link" href="{{ route('register') }}">Rejestracja</a></li>
				@else
					<li class="dropdown nav-item">
						<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
							{{ Auth::user()->name }} <span class="caret"></span>
						</a>

						<ul class="dropdown-menu">
							<li class="nav-item">
								<a  class="nav-link" href="{{ route('logout') }}"
									onclick="event.preventDefault();
											 document.getElementById('logout-form').submit();">
									Wyloguj
								</a>

								<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
									{{ csrf_field() }}
								</form>
							</li>
						</ul>
					</li>
				@endguest
			</ul>
		</div>
	</nav>

		<div class="container site-content">
            @yield('content')
        </div>

	</div>
	<footer class="site-footer">
		Dawid Schmidt 2018, wszelkie prawa zastrzeżone
	</footer>


	<!-- JavaScripts -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
	 crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
	 crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4"
	 crossorigin="anonymous"></script>
</body>

</html>
