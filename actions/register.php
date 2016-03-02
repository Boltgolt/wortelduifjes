<?php
	require "../include/database.php";
	require "../include/strings.php";
	session_start();

	header("Content-Type: application/json");

	function abort($reason) {
		die('{"succes": false, "error": "' . $reason . '"}');
	}

	if (empty($_POST["firstName"])) {
		abort("Een voornaam is verplicht");
	}

	if (strlen($_POST["firstName"]) > 100) {
		abort("Een voornaam is maximaal 100 tekens lang");
	}

	if (!ctype_alpha($_POST["firstName"])) {
		abort("Een voornaam kan alleen uit letters bestaan");
	}

	if (empty($_POST["lastName"])) {
		abort("Een achternaam is verplicht");
	}

	if (strlen($_POST["lastName"]) > 100) {
		abort("Een achternaam is maximaal 100 tekens lang");
	}

	if (!ctype_alpha($_POST["lastName"])) {
		abort("Een achternaam kan alleen uit letters bestaan");
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

	if (!preg_match("/[0-9]/", $_POST["password"])) {
		abort("Een wachtwoord heeft ten minste 1 nummer");
	}

	if (!preg_match("/[A-Z]/", $_POST["password"])) {
		abort("Een wachtwoord heeft ten minste 1 hoofdletter");
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

	if (empty($_POST["age"])) {
		abort("Een leeftijd is verplicht");
	}

	if (is_numeric($_POST["age"])) {
		abort("Een leeftijd is een nummer");
	}

	if (strlen($_POST["description"]) > 2000) {
		abort("Een beschrijving is maximaal 2000 tekens lang");
	}

	if (empty($_POST["captcha"])) {
		abort("De som moet verplicht opgelost worden");
	}

	require "../securimage/securimage.php";
	$securimage = new Securimage();

	if (!$securimage->check($_POST["captcha"])) {
		abort("Dat is niet de correcte oplossing voor de som");
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
		. mysqli_escape_string($mysqli, htmlspecialchars($_POST["firstName"])) . "', '" . mysqli_escape_string($mysqli, htmlspecialchars($_POST["lastName"])) .
		"', '" . mysqli_escape_string($mysqli, htmlspecialchars($_POST["email"])) . "', '" . time() . "', '" . mysqli_escape_string($mysqli, htmlspecialchars($_POST["age"])) .
		"', '" . mysqli_escape_string($mysqli, htmlspecialchars($_POST["lookingFor"])) . "', '" . mysqli_escape_string($mysqli, htmlspecialchars($_POST["description"])) .
		"', '" . md5($_POST["password"]) . "')");

	if (!$query) {
		abort("MySQL fout: " . mysqli_error($mysqli));
	}

	if (!copy($_FILES["photo"]["tmp_name"], "../photos/" . mysqli_insert_id($mysqli))) {
		abort("Fout tijdens opslaan foto");
	}

	print '{"succes": true, "id": "' . mysqli_insert_id($mysqli) . '"}';
	$_SESSION["id"] = mysqli_insert_id($mysqli);
?>
