<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	// Initialize the session
	session_start();
	 
	// Unset all of the session variables
	$_SESSION = array();
	 
	// Destroy the session.
	session_destroy();
	 
	// Redirect to login page
	header("location: home.php");
	exit;
?>