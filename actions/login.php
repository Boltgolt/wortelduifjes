<?php
	require "../include/database.php";
	require "../include/strings.php";

	if (empty($_POST["email"]) && empty($_POST["password"])) {
		header("Location: /", true, 302);
		die();
	}

	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='" . mysqli_escape_string($mysqli, $_POST["email"]) . "'");

	if (mysqli_num_rows($query) != 1) {
		header("Location: /", true, 302);
		die();
	}

	$user = mysqli_fetch_array($query);

	if ($user["hash"] != md5($_POST["password"])) {
		header("Location: /", true, 302);
		die();
	}

	session_start();
	$_SESSION["id"] = $user["id"];
?>
