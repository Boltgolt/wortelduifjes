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
	<link rel="stylesheet" type="text/css" href="static/style/magic.css">

	<script>
		setTimeout(function() {
			document.getElementById("generating").style.opacity = 0

			setTimeout(function() {
				document.getElementById("generating").style.display = "none"
				document.getElementById("found").style.display = "block"

				setTimeout(function() {
					document.getElementById("found").style.opacity = 1
				}, 50)
			}, 400)
		}, 3000)
	</script>
</head>
<body>
	<?php require "include/header.php" ?>
	<div id="generating">
		<img src="static/images/magic.gif" />
		<h1>Het vermoeden van Birch en Swinnerton-Dyer aan het bewijzen...</h1>
	</div>
	<div id="found">
		<div id="profName">
			<h1><?= $randUser["firstName"] ?>
			<?= $randUser["lastName"] ?></h1>
		</div>
		<img src="/photos/<?= $randUser["id"] ?>">
		<br>
		<div id="differentieer">
			<button onclick="location.reload()">Differentieer</button>
			<a href="/profile.php?id=<?= $randUser["id"] ?>"><button>Profiel</button></a>
		</div>
	</div>
</body>
</html>
