<?php
	#session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<form method="post" action="../code.php">
			<img src="https://via.placeholder.com/300x150" alt="Logo" class="logo">
			<input type="text" id="username" name="username" placeholder="Username:">
			<input type="password" id="password" name="password" placeholder="Password:">
			<input type="email" id="email" name="email" placeholder="Email:">
			<input type="submit" value="Register" name="register">
			<span type="register"><p>Already have an account? <a href="../login" class="register-btn">Login</a></p></span>
		</form>
	</div>
</body>
</html>

