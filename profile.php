<?php
	require "include/database.php";
	require "include/strings.php";

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
</head>
<body>
	<h1><?= $user["firstName"] ?> <?= $user["lastName"] ?></h1>
	<img src="/photos/<?= $user["id"] ?>" height="100" width="100"><br />
	<small>Geregistreerd op <?= date("Y-m-d H:i:s", $user["regDate"]) ?></small>
	<p>
		Kleur: <?= $user["color"] ?>
	</p>
	<p>
		Zoekt naar: <?= $user["lookingFor"] ?>
	</p>
	<p>
		Is <?= $user["age"] ?> weken geleden geoogst
	</p>
	<code>
		<?= $user["description"] ?>
	</code>

</body>
</html>
