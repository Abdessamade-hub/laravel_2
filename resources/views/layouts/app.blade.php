<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<title>Test Laravel</title>
</head>
<body class="bg-gray-200">
		<div class="p-6 bg-white justify-between flex mb-6">
			<ul class="flex items-center">
				<li>
					<a href="\" class="p-3">Home</a>
				</li>
				<li>
					<a href="{{ route('dashboard') }}" class="p-3">Dashboard</a>
				</li>
				<li>
					<a href="{{ route('posts') }}" class="p-3">Post</a>
				</li>
			</ul>


			<ul class="flex items-center">

			<!-- @if(auth()->user()) -->
			@auth
				<li>
					<a href="" class="p-3"> {{ auth()->user()->name }} </a>
				</li>
				<li>
					<form action="{{ route('logout') }}" method="post" class="inline p-3">
					 @csrf
						<button type="submit" >Logout</button>
					</form>
					<!-- <a href="{{ route('logout') }}" class="p-3">Logout</a> -->
					
				</li>
			@endauth
			<!-- @else -->
			@guest
				<li>
					<a href="{{ route('register') }}" class="p-3">Register</a>
				</li>
				<li>
					<a href="{{ route('login') }}" class="p-3">Login</a>
				</li>
			@endguest
			<!-- @endif -->
				
				
				
			</ul>
		</div>

		
		@yield('content')
</body>
</html>