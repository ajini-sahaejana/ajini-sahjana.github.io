<?php
	
	session_start();

	require 'config/db.php';
	require_once 'emailController.php';

	$errors = array();
	$errorl = array();
	$username = "";
	$email = "";

	
	//if user click on the sign up button
	if (isset($_POST['signupbtn'])) {
		$username = $_POST['username'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$passwordConf = $_POST['passwordConf'];

		//validation
		if (empty($username)) {
			$errors['username'] = "Username Required";
		}

		if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$errors['email'] = "Email Address is Invalid";
		}		
		if (empty($email)) {
			$errors['email'] = "Email Required";
		}
		if (empty($password)) {
			$errors['password'] = "Password Required";
		}

		if ($password !== $passwordConf) {
			$errors['password'] = "Passwords Do Not Match";
		}

		$emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";
		$stmt = $con -> prepare($emailQuery);
		$stmt -> bind_param('s',$email);
		$stmt -> execute();
		$result = $stmt -> get_result();
		$userCount = $result -> num_rows;
		$stmt -> close();

		if ($userCount > 0){
			$errors['email'] = "Email Already Exists";
		}

		if (count($errors) == 0) {
			$password = password_hash($password, PASSWORD_DEFAULT);
			$token = bin2hex(random_bytes(50));
			$verified = false;

			$sql = "INSERT INTO users (username, email, verified, token, password) VALUES (?,?,?,?,?)";
			$stmt = $con -> prepare($sql);
			$stmt -> bind_param('ssbss', $username, $email, $verified, $token, $password);
			if ($stmt -> execute()) {
				//login user
				$user_id = $con -> insert_id;
				$_SESSION['id'] = $user_id;
				$_SESSION['username'] = $username;
				$_SESSION['email'] = $email;
				$_SESSION['verified'] = $verified;

				sendVerificationEmail($email, $token);

				//flash msg
				$_SESSION['message'] = "You are now logged in!";
				$_SESSION['alert-class'] = "alert-success";
				header('location: submit.php');
				exit();
			}
			else{
				$errors['db_error'] = "Database Error: Failed to Register";
			}
			
		}
	}

	//if user click on the sign in button
	if (isset($_POST['loginbtn'])) {
		$username = $_POST['username'];
		$password = $_POST['password'];

		//validation
		if (empty($username)) {
			$errorl['username'] = "Username Required";
		}
		if (empty($password)) {
			$errorl['password'] = "Password Required";
		}

		if (count($errorl) == 0) {
			$sql = "SELECT * FROM users WHERE email=? OR username=? LIMIT 1";
			$stmt = $con -> prepare($sql);
			$stmt -> bind_param('ss', $username, $username);
			$stmt -> execute();
			$result = $stmt -> get_result();
			$user = $result->fetch_assoc();

			if (password_verify($password, $user['password'])) {
				//login success
				$_SESSION['id'] = $user['id'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['verified'] = $user['verified'];

				//flash msg
				$_SESSION['message'] = "You are now logged in!";
				$_SESSION['alert-class'] = "alert-success";
				header('location: submit.php');
				exit();
			}
			else{
				$errorl['login_fail'] = "Wrong Credentials";
			}
		}
	}


	//logout user
	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['id']);
		unset($_SESSION['username']);
		unset($_SESSION['email']);
		unset($_SESSION['verified']);
		header('location: index.html');
		exit();

	}


	//verify user by token
	function verifyUser($token)
	{
		global $con;
		$sql = "SELECT * FROM users WHERE token= '$token' LIMIT 1";
		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) > 0 ) {
			$user = mysqli_fetch_assoc($result);
			$update_query = "UPDATE users SET verified=1 WHERE token='$token'";

			if (mysqli_query($con, $update_query)) {
				//log user in
				$_SESSION['id'] = $user['id'];
				$_SESSION['username'] = $user['username'];
				$_SESSION['email'] = $user['email'];
				$_SESSION['verified'] = 1;

				//flash msg
				$_SESSION['message'] = "Your email address is successfully verifired.";
				$_SESSION['alert-class'] = "alert-success";
				header('location: submit.php');
				exit();
			}

		}
		else{
			echo 'User not found.';
		}
	}

?>