<?php

	require_once 'vendor/autoload.php';
	require_once 'config/constants.php';

	//create the transport
	$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
		->setUsername(EMAIL)
		->setPassword(PASSWORD)
	;

	//create the mailer using your created transport
	$mailer = new Swift_Mailer($transport);

	
	function sendVerificationEmail($userEmail,$token)
	{
		global $mailer;

		$body = '<!DOCTYPE html>
				<html>
				<head>
					<title>Verify Email</title>
				</head>
				<body>
					<div class="wrapper">
						<p>
							Thank you for signing up on our website. Please click on the link below to verify your email address.
						</p>
						<a href="https://localhost/yvm/submit.php?token=' . $token . '">
							Verify your email address
						</a>
					</div>
				</body>
				</html>';
		//create message
		$message = (new Swift_Message('Verify Your Email Address'))
			->setFrom(EMAIL)
			->setTo($userEmail)
			->setBody($body, 'text/html')
		;

		//send the message
		$result = $mailer->send($message);

	}

?>