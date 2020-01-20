<?php require_once 'controllers/authController.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Sign In / Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/login.css">
	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,900|Source+Sans+Pro:300,300i,400,400i,600,700,900&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container" id="container">
		<div class="form-container sign-up-container">
			<form action="login.php" method="POST">
				<h1>Create Account</h1>

				<?php if(count($errors) > 0) : ?>
					<div class="alert alert-danger">
						<?php foreach ($errors as $error) : ?>
				  	  		<li><?php echo $error ?></li>
				  		<?php endforeach ?>
				  	</div>
				<?php  endif ?>

				<input type="text" name="username" placeholder="Name" value="<?php echo $username;?>" />
				<input type="email" name="email" placeholder="Email" value="<?php echo $email;?>" />
				<input type="password" name="password" placeholder="Password" />
				<input type="password" name="passwordConf" placeholder="Confirm Password" />
				<button type="submit" name="signupbtn">Sign Up</button>
			</form>
		</div>
		<div class="form-container sign-in-container">
			<form action="login.php" method="POST">
				<h1>Sign In</h1>

				<?php if(count($errorl) > 0) : ?>
					<div class="alert alert-danger">
						<?php foreach ($errorl as $error) : ?>
				  	  		<li><?php echo $error ?></li>
				  		<?php endforeach ?>
				  	</div>
				<?php  endif ?>

				<input type="text" name="username" placeholder="Username or Email" value="<?php echo $username;?>" />
				<input type="password" name="password" placeholder="Password" value="<?php echo $email;?>" />
				<a href="#">Forgot your password?</a>
				<button type="submit" name="loginbtn">Sign In</button>
			</form>
		</div>
		<div class="overlay-container">
			<div class="overlay">
				<div class="overlay-panel overlay-left">
					<h1>Welcome Back!</h1>
					<p>To keep connected with us please login with your personal info</p>
					<button class="ghost" name="loginbtn" id="signIn">Sign In</button>
				</div>
				<div class="overlay-panel overlay-right">
					<h1>Your Voice Matters!</h1>
					<p>Enter your personal details and start journey with us</p>
					<button class="ghost" name="signupbtn" id="signUp">Sign Up</button>
				</div>
			</div>
		</div>
	</div>
	<script src="js/login.js" type="text/javascript"></script>
</body>
</html>