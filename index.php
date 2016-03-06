<?php
	require "include/database.php";
	require "include/strings.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Home</title>

	<script type="text/javascript" src="static/script/skrollr.min.js"></script>
	<script type="text/javascript">
		window.addEventListener("load", function() {
			var s = skrollr.init({"forceHeight": false, "smoothScrollingDuration": 50});
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
			}, 2500);
		})
	</script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/index.css">
</head>
<body>
	<?php require "include/header.php" ?>
	<div id="landingBack">
		<span>Zoek je <strong>exacte</strong> match</span>
		<div id="liefhebbers">
			if (empty($_SESSION["id"])) {
				<?php $query = mysqli_query($mysqli, "SELECT COUNT(*) AS gebruikers FROM users"); ?> 
				<p>Uit wel <?= mysqli_fetch_assoc($query)["gebruikers"] - 1; ?> wiskundeliefhebbers!</p>
			}
			else {
				<?php $query = mysqli_query($mysqli, "SELECT COUNT(*) AS gebruikers FROM users"); ?> 
				<p>Uit wel <?= mysqli_fetch_assoc($query)["gebruikers"]; ?> wiskundeliefhebbers!</p>
			{
		</div>
		<a href="/register.php"><button>Registreer nu</button></a>
	</div>
	<div id="explanation">
		<div data-200-bottom="opacity: 0" data--100-bottom="opacity: 1">
			<img src="static/images/randomMath.png">
			<p data-200-bottom="margin-top: 50px;" data--300-bottom="margin-top: 170px;">
				Op Wortelduifjes™ komen de leukste wiskunde enthousiastelingen elkaar tegen
			</p>
		</div>
	</div>
	<div id="quote">
		<div>
			<p data-200-bottom="opacity: 0" data--200-bottom="opacity: 1">
				"Ik dacht dat de <strong>kans</strong> dat ik mijn wederhelft tegenkwam even <strong>reëel</strong> was als de <strong>wortel van -2</strong>, maar Wortelduifjes™ heeft het tegendeel bewezen."
			</p>
			<span  data-100-bottom="margin-right: 0px; opacity: 0;" data-center-top="margin-right: 55px; opacity: 1;">Gill Bates, Wiskundedocent</span>
			<img src="static/images/person.png">
		</div>
	</div>
	<div id="hurrytheforkup" data-bottom-top="background-position: 0% 30%;" data-bottom="background-position: 0% 15%;">
		<div>
			Stop met <span id="opp">worteltrekken</span>, <a href="/register.php">registreer nu</a>.
		</div>
	</div>
	<div id="footer">
		<div>
			<span>©2016, Wortelduifjes™</span>
			<span>Cookies</span>
		</div>
	</div>
</body>
</html>

