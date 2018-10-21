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
		<title>Rising Bugs</title>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="styleSheet.css">
		<div class="header">
			<h1>Website Prototyping</h1>
			<h2>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to this shitty website.</h2>
		</div>
	</head>
	<body>
		<div class="navbar">
			<a href="#">Home</a>
			<a href="#">Contact</a>
			<a href="#">Our Team</a>
			<a href="logout.php" class="right">LogOut</a>
			<a href="profileSettings.php" class="right">Account Settings</a>
			<a href="#" class="right">My Profile</a>
		</div>
		<div class="row">
			<div class="side">
				<h2>Meme of the week</h2>
				<h5>EU be like:</h5>
				<a href="https://i.ytimg.com/vi/d4bRRzZwkbI/maxresdefault.jpg">
					<img src="https://i.ytimg.com/vi/d4bRRzZwkbI/maxresdefault.jpg" alt="HTML tutorial" style="width:337px;height:180px;border:0;">
				</a>
				<p>A commant to this meme.</p>
				<h3>More Text</h3>
				<div class="fakeimg" style="height:60px;">wildcard</div><br>
				<div class="fakeimg" style="height:60px;">wildcard</div><br>
				<div class="fakeimg" style="height:60px;">wildcard</div>
			</div>
			<div class="main">
				<h2>TITLE HEADING</h2>
				<h5>Some text..</h5>
				<div class="fakeimg" style="height:200px;">huuuuuge wildcard</div>
				<p>Some text..</p>
				<br>
				<h2>TITLE HEADING</h2>
				<h5>Some text..</h5>
				<div class="fakeimg" style="height:200px;">huuuuuge wildcard</div>
				<p>Some text..</p>
			</div>
		</div>
		<div class="footer">
			<h2>Footer</h2>
		</div>
	</body>
</html>