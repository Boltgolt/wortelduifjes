<?php
	require "include/strings.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Registreer</title>
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/register.css">
</head>
<body>
	<?php require "header.php"; ?>
	<?php if (!empty($_GET["error"])): ?>
		<h1><?= $_GET["error"] ?></h1>
	<?php endif; ?>
	<form action="actions/register.php" method="post" enctype="multipart/form-data">
		<input name="firstName" placeholder="Voornaam"><br />
		<input name="lastName" placeholder="Achternaam"><br />
		<input name="password" placeholder="Wachtwoord" type="password"><br />
		<input name="email" placeholder="Email" type="email"><br />
		<input name="age" placeholder="Leeftijd"><br />
		<input name="lookingFor" placeholder="Opzoek naar"><br />
		<textarea name="description" placeholder="Beschrijving"></textarea><br />
		Kies een foto:<input name="photo" type="file"><br />
		<button><input type="submit" value="Verstuur"></button>
	</form>
</body>
</html>
