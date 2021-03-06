<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<script src="http://code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="js/script.js"></script>
	<script src="js/theme.js"></script>
		
	<title>Memory</title>
</head>
<body>

<select>
	<option href="#" data-theme="default" class="theme-link">Default</option>
	<option href="#" data-theme="cerulean" class="theme-link">Cerulean</option>
	<option href="#" data-theme="cosmo" class="theme-link">Cosmo</option>
	<option href="#" data-theme="cyborg" class="theme-link">Cyborg</option>
	<option href="#" data-theme="flatly" class="theme-link">Flatly</option>
	<option href="#" data-theme="journal" class="theme-link">Journal</option>
	<option href="#" data-theme="readable" class="theme-link">Readable</option>
	<option href="#" data-theme="simplex" class="theme-link">Simplex</option>
	<option href="#" data-theme="slate" class="theme-link">Slate</option>
	<option href="#" data-theme="spacelab" class="theme-link">Spacelab</option>
	<option href="#" data-theme="united" class="theme-link">United</option>
</select>

	@yield('header')

	<div class="container">

		@yield('content')

	</div>

	@yield('footer')

</body>
</html>