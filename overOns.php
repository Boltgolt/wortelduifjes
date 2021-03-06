<?php
	require "include/database.php";
	require "include/strings.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Over ons</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/overOns.css">
</head>
<body>
	<?php require "include/header.php" ?>
	<div>
		<div id="lem">
			<video src="rick.webm" autoplay muted loop></video>
			<h1>Lem Maria Hendriksen Severein</h1>
			<h2>Generaal</h2>
			<h2>Javascript &#38; PHP</h2>
			<p><video src="rick.webm" autoplay loop></video></p>
			<img src="static/images/lem.png" alt="Lem Maria Hendriksen Severein">
		</div>
		<div id="leon">
			<h1>Leon Ras</h1>
			<h2>Kolonel</h2>
			<h2>Javascript &#38; PHP</h2>
			<p>Al van kinds af aan had ik bewondering voor talen als javascript en php,
			dus wanneer ik hoorde dat ik aan de php van wortelduifjes mocht werken met de legende Lem Severein
			was ik gelijk verkocht.</p>
			<img src="static/images/leon.jpg" alt="Leon ras">
		</div>
	</div>
	<div>
		<div id="jules">
			<h1>Julius Jesse Beuzenberg</h1>
			<h2>Majoor</h2>
			<h2>HTML &#38; CSS</h2>
			<p>
				Ik ben de HTML en CSS expert van deze website. Ik heb ruim &#233&#233n jaar aan ervaring
				met deze talen en border-radius is mijn expertise.
			</p>
			<p>
				Dit is <strong>exact</strong> de <strong>functie</strong><br> die ik zocht bij een bedrijf.
			</p>
			<img src="static/images/jules.jpg" alt="Julius Jesse Beuzenberg">
		</div>
		<div id="emma">
			<h1>Emma Engels</h1>
			<h2>Kapitein</h2>
			<h2>HTML &#38; CSS</h2>
			<p>Ik zorg voor de vrouwelijke input in dit team. Zo bedenk ik een design en schrijf dit in HTML en CSS.
			Mijn <strong>functie</strong> is hier dus erg van belang. Ik heb een jaar ervaring met deze talen.</p>
			<img src="static/images/emma.jpg" alt="Emma">
		</div>
	</div>
</body>
</html>
