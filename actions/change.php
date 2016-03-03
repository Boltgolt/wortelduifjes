<?php
	require "../include/database.php";
	require "../include/strings.php";
	session_start();
	
	if (empty($_POST["changeField"]) || empty($_POST["value"])) {
		die();
	}
	
	$allowedField = ["firstName", "lastName", "age", "lookingFor", "description"];
	
	if (!in_array($_POST["changeField"], $alowedField)) {
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
	

	
	if (strlen($_POST["lastName"]) > 100) {
		abort("Een achternaam is maximaal 100 tekens lang");
	}
	
	if (!ctype_alpha($_POST["lastName"])) {
		abort("Een achternaam kan alleen uit letters bestaan");
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


	
	if (!is_numeric($_POST["age"])) {
		abort("Een leeftijd is een nummer");
	}
	
	if (strlen($_POST["description"]) > 2000) {
		abort("Een beschrijving is maximaal 2000 tekens lang");
	}
	
	$user = mysqli_fetch_array($query);
	if ($user["hash"] != md5($_POST["password"])) {
		die();
	}
	
	$_SESSION["id"] = $user["id"];
	die("ok:" . $user["id"]);
?>
