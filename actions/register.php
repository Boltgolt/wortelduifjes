<?php
	require "../include/database.php";
	require "../include/strings.php";
	header("Content-Type: application/json");
	function abort($reason) {
		die('{"succes": false, "error": "' . $reason . '"}');
	}
	// TODO: naam, leeftijd validatie. wachtwoord sterkte.
	if (empty($_POST["firstName"])) {
		abort("Een voornaam is verplicht");
	}
	if (strlen($_POST["firstName"]) > 100) {
		abort("Een voornaam is maximaal 100 tekens lang");
	}
	if (empty($_POST["lastName"])) {
		abort("Een achternaam is verplicht");
	}
	if (strlen($_POST["lastName"]) > 100) {
		abort("Een achternaam is maximaal 100 tekens lang");
	}
	if (empty($_POST["password"])) {
		abort("Een wachtwoord is verplicht");
	}
	if (strlen($_POST["password"]) < 6) {
		abort("Een wachtwoord is minimaal 6 tekens lang");
	}
	if (strlen($_POST["password"]) > 20) {
		abort("Een wachtwoord is maximaal 20 tekens lang");
	}
	if( !preg_match("#[0-9]+#", $_POST["password") ) {
		abort("Password must include at least one number!");
	}
	if (empty($_POST["email"])) {
		abort("Een emailadres is verplicht");
	}
	if (strlen($_POST["email"]) > 60) {
		abort("Een emailadres is maximaal 60 tekens lang");
	}
	if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		abort("Dat emailadres is niet correct");
	}
	if (strlen($_POST["description"]) > 300) {
		abort("Een beschrijving is maximaal 300 tekens lang");
	}
	if (empty($_FILES["photo"])) {
		abort("Een foto is verplicht");
	}
	if (getimagesize($_FILES["photo"]["tmp_name"]) === false) {
		abort("Een foto moet een afbeelding zijn");
	}
	$query = mysqli_query($mysqli, "SELECT * FROM users WHERE email='" . mysqli_escape_string($mysqli, $_POST["email"]) . "'");
	if (mysqli_num_rows($query) != 1) {
		abort("Dat emailadres is al geregistreerd");
	}
	$query = mysqli_query($mysqli, "INSERT INTO users (id, firstName, lastName, email, regDate, age, lookingFor, description, hash) VALUES (DEFAULT, '"
		. mysqli_escape_string($mysqli, $_POST["firstName"]) . "', '" . mysqli_escape_string($mysqli, $_POST["lastName"]) . "', '" . mysqli_escape_string($mysqli, $_POST["email"])
		. "', '" . time() . "', '" . mysqli_escape_string($mysqli, $_POST["age"]) . "', '"
		. mysqli_escape_string($mysqli, $_POST["lookingFor"]) . "', '" . mysqli_escape_string($mysqli, $_POST["description"]) . "', '" . md5($_POST["password"]) . "')");
	if (!$query) {
		abort("MySQL fout:" . mysqli_error($mysqli));
	}
	if (!copy($_FILES["photo"]["tmp_name"], "../photos/" . mysqli_insert_id($mysqli))) {
		abort("Fout tijdens opslaan foto");
	}
	print '{"succes": true, "id": "' . mysqli_insert_id($mysqli) . '"}';
	session_start();
	$_SESSION["id"] = mysqli_insert_id($mysqli);
?>
