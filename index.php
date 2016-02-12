<?php
	require "include/database.php";
	require "include/strings.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Home</title>

	<script type="text/javascript" src="static/script/skrollr.min.js"></script>
	<script type="text/javascript">
	window.addEventListener("load", function() {
		var s = skrollr.init();
	})

	</script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/index.css">
</head>
<body>
	<div id="header">
		<ul>
			<li><a href="/action/login.php">Log in</a></li>
			<li><a href="/action/register.php">Registreer</a></li>
			<li><a href="/overOns">Over ons</a></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
	</div>
	<div id="landingBack">
		<span>Zoek je <strong>exacte</strong> match</span>
		<button>Registreer nu</button>
	</div>
	<div id="explanation" data-bottom-top="top: 100vh;" data-top-bottom="top: 30vh;">
		<div data-100-bottom="opacity: 1" data-bottom-top="opacity: 0">
			<img src="static/images/randomMath.png">
			<p data-100-bottom="margin-top: 100px;" data-bottom-top="margin-top: 50px;">
				Op Wortelduifjes™ komen de leukeste wiskunde enthousiastelingen elkaar tegen
			</p>
		</div>
	</div>
	<div id="quote">
		<div>
			<p>
				"Beste quote ooit"
			</p>
			<span>Henk Jansen</span>
			<img src="static/images/person.png">
		</div>
	</div>
</body>
</html>
