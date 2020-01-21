<?php 
	require_once 'controllers/authController.php'; 

	//verify the user using token
	if (isset($_GET['token'])) {
		$token = $_GET['token'];
		verifyUser($token);
	}

	if (!isset($_SESSION['id'])) {
		header('location: index.html');
		exit();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Submit Your Concern</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!--Google Fonts-->
	<link href="https://fonts.googleapis.com/css?family=Raleway:300,300i,400,400i,500,500i,600,600i,700,700i,800,900|Source+Sans+Pro:300,300i,400,400i,600,700,900&display=swap" rel="stylesheet">

	<!--favicon-->
	<link rel="icon" type="image/png" href="images/favicon.png">

	<!--css-->			
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/submit.css">
	
	<!--fontawesome-->
	<link rel="stylesheet" type="text/css" href="css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
</head>
<body>
	<header class="header" id="HOME">
		<div class="header-overlay">
			<!-- Navigation Bar -->
			<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
				<a class="navbar-brand" href="#HOME"><img src="images/logo.png" alt="logo"></a>
				<div class="navbar-header">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
						<span class="navbar-toggler-icon"></span>
					</button>
				</div>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item"><a href="index.html" class="nav-link">HOME</a></li>
						<li class="nav-item"><a href="index.html" class="nav-link">SEE WHAT OTHERS ARE TALKING ABOUT</a></li>
						<li class="nav-item"><a href="index.html?logout=1" class="nav-link">LOG OUT</a></li>
					</ul>
				</div>  
			</nav>


			<section class="submit">
				<div class="container">
					<?php if (isset($_SESSION['message'])): ?>
						<div class="alert <?php echo $_SESSION['alert-class']; ?>">
							<?php
								echo $_SESSION['message'];
								unset($_SESSION['message']);
								unset($_SESSION['alert-class']);
							?>
						</div>
					<?php endif; ?>

					<h2>Welcome, <?php echo $_SESSION['username']; ?>!</h2>

					<?php if (!$_SESSION['verified']): ?>
						<div class="alert alert-warning">
							<p>You need to verify your account.<br>
								Sign in to your email account and click on the verification link we just sent you at <strong><?php echo $_SESSION['email']; ?></strong></p>
						</div>
					<?php endif; ?>
				</div>
				
				<div class="container">
					<script type="text/javascript" src="https://form.jotform.com/jsform/200191525704043"></script>
				</div>
			</section>
		</div>
	</header>


	<!--Footer-->
	<footer class="footer">
		<div class="container">
			<div class="row">
				<div class="col-md-4 footer-col">
					<div id="copyright">
						<h1 class="footer-title">Disclaimer</h1>
						<p>Copyright &copy; 2020 <a href="#HOME"> - Your Voice Matters!</a></p>
						<p>This site is protected by reCAPTCHA and the Google 
							<a href="https://policies.google.com/privacy" class="sc-fjdhpX bUZXjM">Privacy Policy</a> and 
							<a href="https://policies.google.com/terms" class="sc-fjdhpX bUZXjM">Terms of Service</a> apply.
						</p>
					</div>
				</div>
				<div class="footer-col col-md-3 footer-connect">
					<h1 class="footer-title">Connect</h1>
					<a href="https://www.facebook.com/" target="_blank" class="footer-sm-block">
						<span class="fa fa-facebook"></span>
						<span class="footer-sm-text">yourvoicematters</span>
					</a>
					<a href="https://www.instagram.com/" target="_blank" class="footer-sm-block">
						<span class="fa fa-instagram"></span>
						<span class="footer-sm-text">yourvoicemattersl</span>
					</a>
					<a href="https://twitter.com/" target="_blank" class="footer-sm-block">
						<span class="fa fa-twitter"></span>
						<span class="footer-sm-text">yvm-sl</span>
					</a>
					<a href="https://www.whatsapp.com/" target="_blank" class="footer-sm-block">
						<span class="fa fa-whatsapp"></span>
						<span class="footer-sm-text">0766023273</span>
					</a>
					<a href="https://www.linkedin.com/company" target="_blank" class="footer-sm-block">
						<span class="fa fa-linkedin"></span>
						<span class="footer-sm-text">Your Voice Matters - SL</span>
					</a>
				</div>				
				<div class="footer-col col-md-3 offset-1">
					<h1 class="footer-title">Quick Links</h1>
					<div class="footer-links">
						<ul>
							<li><a href="login.php">Submit Your Concern</a></li>
							<li><a href="#">The Team</a></li>
							<li><a href="#">Privacy Policy</a></li>
							<li><a href="#">FAQ</a></li>
						</ul>
					</div>
					<h1 class="footer-title">Language</h1>
					<div class="language">
						<select class="languagepicker">
							<option value="en-US">English</option>
							<option value="si-si">සිංහල</option>
						</select>
					</div>
				</div>
				<div class="footer-col col-md-1 footer-connect">	
					<img src="images/logo.png" alt="logo">
					<div class="scroll-top">
						<a href="#HOME"><i class="fa fa-angle-up"></i></a>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<!--Bootsrap JS-->
	<script src="js/jquery.js"></script>
	<script type="js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
	<!--custom js-->
	<script src="js/custom.js" type="text/javascript"></script>

</body>
</html>