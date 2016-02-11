<?php
	session_destroy();

	header("Location: /", true, 302);
	die();
?>
