<?php
	require "../include/database.php";
	require "../include/strings.php";
	session_start();
	
	if (empty($_SESSION["id"])) {
		die();
	}
	
	$query = mysqli_query($mysqli, "DELETE FROM users WHERE id=" . $_SESSION["id"]);
?>
