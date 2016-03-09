<?php
	require "../include/database.php";
	require "../include/strings.php";
	session_start();
	
	$query = mysqli_query($mysqli, "DELETE FROM users WHERE id=" . $_SESSION["id"]);
?>
