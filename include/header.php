<?php
	if(!empty($_SESSION["id"]) {
		require "include/database.php";
		require "include/strings.php";
		$query = mysqli_query($mysqli, "SELECT * FROM users WHERE id='" . mysqli_escape_string($mysqli, $_SESSION["id"]) . "'");
		if (!$query) {
			die("MySQL fout");
		}
		if (mysqli_num_rows($query) == 0) {
			die("Niet bestaand profiel");
			// TODO: niet die pleas
		}
		$user = mysqli_fetch_assoc($query)
	}
?>
<div id="header">
	<a href="/">
		<img src="static/images/logo.png">
	</a>
	<ul>
		<a href="/register.php"><li>Registreer</li></a>
		<a href="/overOns.php"><li>Over ons</li></a>
		<a href="/contact.php"><li>Contact</li></a>
	</ul>
	<?php if(!empty($_SESSION["id"])): ?>
	<a href="#">
		<div id="headerUser">
			<img src="/photos/<?= $user["id"] ?>">
			<span><?= $user["firstName"]?> <?= $user["lastName"]?></span>
		</div>
	</a>
	<?php else: ?>
		<a href="#">
		<div id="headerUser">
			<img src="static/images/noPhoto.png">
			<span>Log in</span>
		</div>
	</a>
	<?php endif; ?>
</div>

