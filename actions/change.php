<?php
	require "../include/database.php";
	require "../include/strings.php";
	session_start();

	function abort() {
		die();
	}

	if (empty($_POST["changeField"]) || empty($_POST["value"])) {
		die();
	}

	$allowedField = ["firstName", "lastName", "age", "lookingFor", "description"];

	if (!in_array($_POST["changeField"], $allowedField)) {
	  die();
	}

	if ($_POST["changeField"] == "firstName") {

		if (strlen($_POST["value"]) > 100) {
			die();
		}

		if (!ctype_alpha($_POST["value"])) {
			die();
		}
	}

	if ($_POST["changeField"] == "lastName") {

		if (strlen($_POST["value"]) > 100) {
		abort("Een achternaam is maximaal 100 tekens lang");
		}

		if (!ctype_alpha($_POST["value"])) {
		abort("Een achternaam kan alleen uit letters bestaan");
		}
	}

	if ($_POST["changeField"] == "password") {

		if (strlen($_POST["value"]) < 6) {
			abort("Een wachtwoord is minimaal 6 tekens lang");
		}

		if (strlen($_POST["value"]) > 20) {
			abort("Een wachtwoord is maximaal 20 tekens lang");
		}

		if (!preg_match("/[0-9]/", $_POST["value"])) {
			abort("Een wachtwoord heeft ten minste 1 nummer");
		}

		if (!preg_match("/[A-Z]/", $_POST["value"])) {
			abort("Een wachtwoord heeft ten minste 1 hoofdletter");
		}
	}

	if ($_POST["changeField"] == "age") {

		if (!is_numeric($_POST["value"])) {
			abort("Een leeftijd is een nummer");
		}
	}

	if ($_POST["changeField"] == "description") {

		if (strlen($_POST["value"]) > 2000) {
			abort("Een beschrijving is maximaal 2000 tekens lang");
		}
	}

	$query = mysqli_query($mysqli, "UPDATE users SET " . $_POST["changeField"] .
	"='" . mysqli_escape_string($mysqli, htmlspecialchars($_POST["value"])) . "' WHERE id=" . $_SESSION["id"]);

	die("OK");

?>
