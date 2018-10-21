<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	// https://www.tutorialrepublic.com/php-tutorial/php-mysql-login-system.php

	define('DB_SERVER', 'localhost');
	define('DB_USERNAME', 'root');
	define('DB_PASSWORD', '');
	define('DB_NAME', 'le_demo');
	
	$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
	 
	if ($link === false)
	{
		die("ERROR: Could not connect. " . mysqli_connect_error());
	}
	
/*
	Source: https://www.w3schools.com/

	define();
		Are like variables, however, 
			- only strings and numbers
			- do not need a leading dollar sign ($)
			- cannot be changed after it is set
			- can be accessed regardless of scope
			
	mysqli_connect();
		Opens a new connection to the MySQL server
		
	die();
		Prints a message and exits the current script
*/
?>