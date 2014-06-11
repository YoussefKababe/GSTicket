<!doctype html>
<html class="login-page" lang="en">
<head>
	<meta charset="UTF-8">
	<title>GSTicket | Login</title>
	{{ stylesheet_link_tag() }}
</head>
<body>
	<div class="container">

		<div class="login-form">
		<h1>GSTicket</h1>

			@yield('content')
		</div>

	</div>

	{{ javascript_include_tag() }}
	@yield('scripts')
</body>
</html>