<?
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>bSocial - Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<form method="post" action="../code.php">
			<?php 
				if($_SESSION['status'] == "Password"){
					echo '<div class="alert">
					<button class="closebtn" onclick="this.parentElement.style.display="none";">&times;</button> 
					<strong>Error!</strong> Incorrect Username Or Password
				</div>';
				}
				unset($_SESSION['status']);
			?>
		
			<img src="https://via.placeholder.com/300x150" alt="Logo" class="logo">
			<input type="text" id="username" name="username" placeholder="Username:">
			<input type="password" id="password" name="password" placeholder="Password:">
			<input type="submit" value="Login" name="login_btn">
			<span type="register"><p>Don't have an account? <a href="../register" class="register-btn">Register</a></p></span>
		</form>
	</div>
</body>
</html>

