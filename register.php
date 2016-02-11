<?php
	require "include/strings.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Registreer</title>
</head>
<body>
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
		Kies een foto: <input name="photo" type="file"><br />
		<input type="submit" value="Verstuur">
	</form>
</body>
</html>
