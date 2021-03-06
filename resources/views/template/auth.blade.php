<!DOCTYPE html>
<html lang="fr">
<head>
	<title>@yield('title') - Manga Origines</title></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="/images/static/favicon.ico" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/auth/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/auth/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/auth/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="/auth/vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="/auth/vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="/auth/vendor/animsition/css/animsition.min.css">
	<link rel="stylesheet" type="text/css" href="/auth/vendor/select2/select2.min.css">	
	<link rel="stylesheet" type="text/css" href="/auth/vendor/daterangepicker/daterangepicker.css">
	<link rel="stylesheet" type="text/css" href="/auth/css/util.css">
	<link rel="stylesheet" type="text/css" href="/auth/css/main.css">
</head>
<body class="{{ Cookie::get('theme-mode') }}">
	
	<div class="limiter">
		<div class="container-login100">
			@yield('content')
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
	<script src="/auth/vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="/auth/vendor/animsition/js/animsition.min.js"></script>
	<script src="/auth/vendor/bootstrap/js/popper.js"></script>
	<script src="/auth/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="/auth/vendor/select2/select2.min.js"></script>
	<script src="/auth/vendor/daterangepicker/moment.min.js"></script>
	<script src="/auth/vendor/daterangepicker/daterangepicker.js"></script>
	<script src="/auth/vendor/countdowntime/countdowntime.js"></script>
	<script src="/auth/js/main.js"></script>

</body>
</html>