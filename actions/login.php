<?php
	require "../include/database.php";
	require "../include/strings.php";
	session_start();

	if (empty($_POST["email"]) || empty($_POST["password"])) {
		die();
	}

	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='" . mysqli_escape_string($mysqli, $_POST["email"]) . "'");

	if (mysqli_num_rows($query) != 1) {
		die();
	}

	$user = mysqli_fetch_array($query);

	if ($user["hash"] != md5($_POST["password"])) {
		die();
	}

	$_SESSION["id"] = $user["id"];
	die("ok:" . $user["id"]);
?>
