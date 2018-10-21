<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

	// Initialize the session
	session_start();
	 
	// Check if the user is logged in, if not then redirect him to login page
	if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: login.php");
		exit;
	}
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>Profile Settings</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
			body{ font: 14px sans-serif; text-align: center; }
		</style>
	</head>
	<body>
		<div class="page-header">
			<h1>Profile Settings</h1>
		</div>
		<p>
			<a href="resetPassword.php" class="btn btn-warning">Reset Your Password</a>
			<a href="changeUsername.php" class="btn btn-primary">Change Your Username</a>
			<a href="logout.php" class="btn btn-danger">Sign Out</a>
		</p>
	</body>
</html>