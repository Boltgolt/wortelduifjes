<?php
	require "include/database.php";
	require "include/strings.php";
	session_start();

	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id='" . mysqli_escape_string($mysqli, $_GET["id"]) . "'");
	if (!$query) {
		die("MySQL fout");
	}
	if (mysqli_num_rows($query) == 0) {
		die("Niet bestaand profiel");
	}
	$user = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - <?= $user["firstName"] ?> <?= $user["lastName"] ?></title>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/profile.css">
</head>
<body>
	<?php require "include/header.php" ?>
	<h1><?= $user["firstName"] ?> <?= $user["lastName"] ?></h1>
	<img src="/photos/<?= $user["id"] ?>" ><br />
	<small>Geregistreerd op <?= date("Y-m-d H:i:s", $user["regDate"]) ?></small>
	<div id= "zoekt">
		Zoekt naar: <?= $user["lookingFor"] ?>
	</div>
	<div id="leeftijd">
		Is <?= $user["age"] ?> jaar oud.
	</div>
	<code>
		<?= nl2br($user["description"]) ?>
	</code>

</body>
</html>
