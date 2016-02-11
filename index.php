<?php
	require "include/database.php";
	require "include/strings.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Home</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="header">
		<ul>
			<li><a href="/action/logIn">Log in</a></li>
			<li><a href="/action/logIn">Registreer</a></li>
			<li><a href="/overOns">Over ons</a></li>
			<li><a href="/contact">Contact</a></li>
		</ul>
	</div>
</body>
</html>
