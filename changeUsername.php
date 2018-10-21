<?php

	session_start();
	
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true)
	{
		header("location: login.php");
		exit;
	}

	require_once "config.php";
	
	$new_username = $confirm_username = "";
	$new_username_err = $confirm_username_err = "";
	
	// Processing form data when form is submitted
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		// Validate new username
		if(empty(trim($_POST["new_username"])))
		{
			$new_username_err = "Please enter the new username.";     
		}
		else
		{
			// Prepare a select statement
			$sql = "SELECT id FROM users WHERE username = ?";
			
			if ($stmt = mysqli_prepare($link, $sql))
			{
				// Bind variables to the prepared statement as parameters
				mysqli_stmt_bind_param($stmt, "s", $param_username);
				// Set parameters
				$param_username = trim($_POST["new_username"]);
				
				// Attempt to execute the prepared statement
				if (mysqli_stmt_execute($stmt))
				{
					/* store result */
					mysqli_stmt_store_result($stmt);
					
					if (mysqli_stmt_num_rows($stmt) == 1)
					{
						$new_username_err = "This username is already taken.";
					}
					else
					{
						$new_username = trim($_POST["new_username"]);
					}
				}
				else
				{
					echo "Oops! Something went wrong. Please try again later.";
				}
			}
			
			// Close statement
			mysqli_stmt_close($stmt);
		}
		
		// Validate confirm username
		if(empty(trim($_POST["confirm_username"])))
		{
			$confirm_username_err = "Please confirm the username.";
		}
		else
		{
			$confirm_username = trim($_POST["confirm_username"]);
			if(empty($new_username_err) && ($new_username != $confirm_username)){
				$confirm_username_err = "Username did not match.";
			}
		}
		
		// Check input errors before updating the database
		if (empty($new_username_err) && empty($confirm_username_err))
		{
			$sql = "UPDATE users SET username = ? WHERE id = ?";
			
			if ($stmt = mysqli_prepare($link, $sql))
			{
				mysqli_stmt_bind_param($stmt, "si", $param_username, $param_id);
				
				$param_username = $new_username; ///////////////////////
				$param_id = $_SESSION["id"];
				
				/*
				if (mysqli_stmt_num_rows($stmt) == 1)
				{
					$username_err = "This username is already taken.";
				}
				else
				{
					$username = trim($_POST["username"]);
				}
				*/
				
				if (mysqli_stmt_execute($stmt))
				{
					session_destroy();
					// Redirect user to homeLogged page
					header("location: home.php");
					exit();
				}
				else
				{
					echo "Something went wrong. Please try again later.";
				}
			}
			
			mysqli_stmt_close($stmt);
		}
		
		mysqli_close($link);
	}
?>

<!DOCTYPE html>
<html lang="de">
	<head>
		<meta charset="UTF-8">
		<title>Reset Username</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
		<style type="text/css">
			body{ font: 14px sans-serif; }
			.wrapper{ width: 350px; padding: 20px; }
		</style>
	</head>
	<body>
		<div class="wrapper">
			<h2>Reset Username</h2>
			<p>Please fill out this form to reset your username.</p>
			<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
				<div class="form-group <?php echo (!empty($new_username_err)) ? 'has-error' : ''; ?>">
					<label>New Username</label>
					<input type="username" name="new_username" class="form-control" value="<?php echo $new_username; ?>">
					<span class="help-block"><?php echo $new_username_err; ?></span>
				</div>
				<div class="form-group <?php echo (!empty($confirm_username_err)) ? 'has-error' : ''; ?>">
					<label>Confirm Username</label>
					<input type="username" name="confirm_username" class="form-control">
					<span class="help-block"><?php echo $confirm_username_err; ?></span>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" value="Submit">
					<a class="btn btn-link" href="homeLogged.php">Cancel</a>
				</div>
			</form>
		</div>
	</body>
</html>