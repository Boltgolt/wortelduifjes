<?php
	require "include/database.php";
	require "include/strings.php";
	session_start();

	if (!empty($_SESSION["id"])) {
		header("Location: /", true, 302);
		die();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Home</title>

	<script src="static/script/login.js"></script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/register.css">
	<link rel="stylesheet" type="text/css" href="static/style/login.css">
</head>
<body>
	<?php require "include/header.php" ?>
	<div>
		<input type="text" id="email" placeholder="Email"><br />
		<input type="password" id="password" placeholder="Wachtwoord"><br />
		<button id="loginButton" >Log in</button>
	</div>
</body>
</html>
