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
	$profileUser = mysqli_fetch_assoc($query)
?>
<!DOCTYPE html>
<html>
<head>
	<title><?= $globalTitle ?> - <?= $profileUser["firstName"] ?> <?= $profileUser["lastName"] ?></title>

	<script src="static/script/edit.js"></script>

	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Architects+Daughter|Open+Sans:400,300">
	<link rel="stylesheet" type="text/css" href="static/style/global.css">
	<link rel="stylesheet" type="text/css" href="static/style/profile.css">
</head>
<body>
	<?php require "include/header.php" ?>
	<h1><?= $profileUser["firstName"] ?><?php if ($_SESSION["id"] == $_GET["id"]): ?><span onclick="edit('firstName')" class="fa fa-pencil"></span><?php endif; ?> <?= $profileUser["lastName"] ?><?php if ($_SESSION["id"] == $_GET["id"]): ?><span onclick="edit('lastName')" class="fa fa-pencil"></span><?php endif; ?></h1>
	<img src="/photos/<?= $profileUser["id"] ?>" ><br />
	<small>Geregistreerd op <?= date("Y-m-d H:i:s", $profileUser["regDate"]) ?></small>
	<div id= "zoekt">
		Zoekt naar: <?= $profileUser["lookingFor"] ?><?php if ($_SESSION["id"] == $_GET["id"]): ?><span onclick="edit('lookingFor')" class="fa fa-pencil"></span><?php endif; ?>
	</div>
	<div id="leeftijd">
		Is <?= $profileUser["age"] ?> jaar oud.<?php if ($_SESSION["id"] == $_GET["id"]): ?><span onclick="edit('age')" class="fa fa-pencil"></span><?php endif; ?>
	</div>
	<div id="beschrijving">
		<?= nl2br($profileUser["description"]) ?><?php if ($_SESSION["id"] == $_GET["id"]): ?><span onclick="edit('description')" class="fa fa-pencil"></span><?php endif; ?>
	</div>

</body>
</html>
