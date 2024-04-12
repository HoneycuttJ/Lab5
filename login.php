<!DOCTYPE html>
<html lang="en">
    <head>
	<title>Login Page</title>
	<link href="css/login.css" rel="stylesheet" />
	</head>
		<body>
		<div class="login">
			<h1>Login</h1>
			<form name="login-form" method="POST" action="validate-login.php">
				<input type="text" name="u" id="u" placeholder="Username" required="required" />
				<input type="password" name="p" id="p" placeholder="Password" required="required" />
				<button type="submit" class="btn btn-primary btn-block btn-large">Let me in.</button>
			</form>
		</div>
	</body>