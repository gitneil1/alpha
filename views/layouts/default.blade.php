<!DOCTYPE html>
<html lang="en">
<head>
	@include('includes.head')
</head>
<body>
	<header class="row">
		@include('includes.header')
	</header>

	<div class="container">
		
		
		<div id="sidebarAndMain">
			<section class="sidebar-nav">
				@yield('sidebar')
			</section>
			<section id="main" class="row">

				@yield('content')
			</section>
		</div>
		
			<footer class="row">
				@include('includes.footer')
			</footer>
		
	</div>
</body>
</html>