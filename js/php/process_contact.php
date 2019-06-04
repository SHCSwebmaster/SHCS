<?php

	if (!isset($_SESSION)) {

		session_start(); //start session

	}

	if (!$_POST) { //if post is not existent

		exit;

	}

	include_once('settings/settings.php'); //Contact Form settings..Supply your own settings

	// Catch form field variables, these comes from the forms

	$fullname = strip_tags(trim($_POST["fullname"]));
	$emailaddress = strip_tags(trim($_POST["emailaddress"]));
	$subject = strip_tags(trim($_POST["subject"]));
	$query = strip_tags(trim($_POST["query"]));
	$captcha = strip_tags(trim($_POST["captcha"]));

	// Error Arrays
	$errors = array();

	include_once('phpmailer/PHPMailerAutoload.php'); // Load PHP Mailer Library 
	include_once('templates/message.php'); //template for user's message to you or your company


	// validate security captcha - Server side level -- no cheating, no robots

	if (isset($_POST["captcha"])) {

		if (!$captcha) {

			$errors[] = "You must enter the correct captcha code";

		} else if (($captcha) != $_SESSION['captcha_id']) {

			$errors[] = "Captcha code is incorrect";

		}

	}

	if ($errors) { //server side error notification

		$errorlist = "";

		foreach ($errors as $error) {

			$errorlist .= '<li>'. $error . "</li>";

		}

		echo '<div class="alert alert-danger"> There are errors: <br> <ul>'. $errorlist .'</ul></div>';

	} else {

		// If no errors
		// SMTP Version
	
		$mail = new PHPMailer();	
		$mail->isSMTP();                                      
		$mail->Host = $SMTP_host;                    
		$mail->SMTPAuth = true;                              
		$mail->Username = $SMTP_username;               
		$mail->Password = $SMTP_password;               
		$mail->SMTPSecure = $SMTP_protocol;                            
		$mail->Port = $SMTP_port;
		$mail->IsHTML(true);
		$mail->From = $emailaddress;
		$mail->CharSet = "UTF-8";
		$mail->FromName = $fullname;
		$mail->Encoding = "base64";
		$mail->Timeout = 200;
		$mail->ContentType = "text/html";
		$mail->addAddress($company_email, $company_name); //send the contact form to this address
		$mail->Subject = $subject;
		$mail->Body = $message;
		$mail->AltBody = "If you are not seeing the full message. View the email as HTML";

		if ($mail->Send()) {

			if ($autoResponder == true) {
					
				include_once('templates/autoresponder.php');
				
				$automail = new PHPMailer();	
				$automail->isSMTP();                                      
				$automail->Host = $SMTP_host;                    
				$automail->SMTPAuth = true;                              
				$automail->Username = $SMTP_username;               
				$automail->Password = $SMTP_password;               
				$automail->SMTPSecure = $SMTP_protocol;                            
				$automail->Port = $SMTP_port;
				$automail->From = $emailaddress;
				$automail->FromName = $fullname;
				$automail->isHTML(true);                                 
				$automail->CharSet = "UTF-8";
				$automail->Encoding = "base64";
				$automail->Timeout = 200;
				$automail->ContentType = "text/html";
				$automail->AddAddress($emailaddress, $fullname); //send the autoresponder message to this address and name
				$automail->Subject = "This is to confirm we have received your message";
				$automail->Body = $automessage;
				$automail->AltBody = "If you are not seeing the full message. View the email as HTML";
				$automail->Send();

			}

			if ($redirectForm == true) { //if you want to redirect to another page

				echo '<script> setTimeout(function () { window.location.replace("'. $redirectForm_url .'") }, 5000); </script>';
			
			}

			// Successfully Delivery

			echo '<div class="alert alert-success"> Message has been sent successfully! </div>';
			
		} else {

			// Failed Delivery
			echo '<div class="alert alert-danger"> Message not sent - A server error occured! </div>';	

		}

	}

?>