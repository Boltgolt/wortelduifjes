<?php
	require "include/database.php";
	require "include/strings.php";
	session_start();
	if (empty($_SESSION["id"])) {
	  die();
  }
  $query = mysqli_query($mysqli, "SELECT * FROM users ORDER BY RAND() LIMIT 1");
	if (!$query) {
		die("MySQL fout");
	}
	if (mysqli_num_rows($query) == 0) {
		die("Niet bestaand profiel");
	}
	$randUser = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - Wellicht is dit de goede y?</title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/profile.css">
</head>
<body>
	<?php require "include/header.php" ?>
	<?= $randUser["firstName"] ?>
	<?= $randUser["lastName"] ?>
	<br>
	<img src="/photos/<?= $randUser["id"] ?>">
	<br>
	<div id="differentieer">
		<button onclick="location.reload()">Differentieer</button>
	</div>
</body>
</html>
