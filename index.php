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

			var opp = ["worteltrekken", "differentiëren", "analyseren", "integreren"]
			var elem = document.getElementById("opp")
			var index = 0

			setInterval(function () {
				if (index < opp.length - 1) {
					index++
				}
				else {
					index = 0
				}

				elem.style.opacity = 0;

				setTimeout(function () {
					elem.innerHTML = opp[index];
					elem.style.opacity = 1;
				}, 310);
			}, 3000);
		})
	</script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Open+Sans:400,300">
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
	<div id="explanation">
		<div data-200-bottom="opacity: 0" data--100-bottom="opacity: 1">
			<img src="static/images/randomMath.png">
			<p data-200-bottom="margin-top: 50px;" data--300-bottom="margin-top: 170px;">
				Op Wortelduifjes™ komen de leukeste wiskunde enthousiastelingen elkaar tegen
			</p>
		</div>
	</div>
	<div id="quote">
		<div>
			<p data-200-bottom="opacity: 0" data--200-bottom="opacity: 1">
				"Ik dacht dat de <strong>kans</strong> dat ik mijn wederhelft tegenkwam even <strong>reëel</strong> was als de <strong>wortel van -2</strong>, maar Wortelduifjes™ heeft het tegendeel bewezen."
			</p>
			<span  data-100-bottom="margin-right: 0px; opacity: 0;" data--200-bottom="margin-right: 55px; opacity: 1;">Gill Bates, Wiskundedocent</span>
			<img src="static/images/person.png">
		</div>
	</div>
	<div id="hurrytheforkup">
		<div>
			Stop met <span id="opp">worteltrekken</span>, <a href="/register.php">registreer nu</a>.
		</div>
	</div>
	<div id="footer">
		<div>
			<span>©2015, Wortelduifjes™</span>
			<span>Cookies</span>
		</div>
	</div>
</body>
</html>
