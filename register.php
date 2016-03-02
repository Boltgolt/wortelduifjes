<?php
	require "include/strings.php";
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Registreer</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/register.css">

	<script src="static/script/register.js"></script>
</head>
<body>
	<?php require "include/header.php"; ?>
	<div>
		<label for="photo" id="photoContainer">
			<input name="photo" id="photo" type="file" class="hide">
			<img id="photoPre" src="static/images/noPhotoRegister.png">
			<div>Kies een foto</div>
		</label>
		<input id="firstName" placeholder="Voornaam" class=""><br />
		<input id="lastName" placeholder="Achternaam"><br />
		<input id="password" placeholder="Wachtwoord" type="password"><br />
		<input id="email" placeholder="Email" type="email"><br />
		<input id="age" placeholder="Leeftijd" type="number"><br />
		<input id="lookingFor" placeholder="Opzoek naar"><br />
		<textarea id="description" placeholder="Beschrijving"></textarea><br />

		<img src="/securimage/securimage_show.php">
		<input id="captcha" placeholder="Wat is de oplossing op de som hierboven?" type="number"><br />

		<button id="registerButton">Registreer</button>
	</div>
</body>
</html>
