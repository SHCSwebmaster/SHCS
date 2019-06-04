<?php

	/* Enter your name or company name */

	$company_name = "Sacred Heart Cathedral School";
	
	/* Enter your message subject below */	

	$subject = "New Contact Message";
	
	/* Form message will be sent to this email address */
	 
	$company_email = "info@shcs.ptdiocese.org";
	
	/* If you want to redirect to another page after sending the form
	 * Change the $redirectForm option below from (false) to (true)  */	

	$redirectForm = false; //set to true to redirect to another page

	$redirectForm_url = "https://your_site.com/thankyou.php";
	
	/* If you want to automatically reply to the sender, set to true */ 

	$autoResponder = true; //set false to deactive autoresponders
	
	/* Add your SMTP details below -- update settings for your own configurations */    

	$SMTP_host = 'smtp.gmail.com'; 					// SMTP servers 
	$SMTP_username = 'no-reply@shcs.ptdiocese.org'; 				// SMTP username       
	$SMTP_password = 'jY3Q=>A2';				// SMTP password
	$SMTP_protocol = 'tls';								// SMTP encryption ssl or tl' accepted here	  
	$SMTP_port = '587';									// SMTP Port number example 25, 465, 587

	/* Something Like this in real Life - (The password is wrong ofcourse..LOL) */
	
	//$SMTP_host = 'marconi.hostrush.com'; 				// SMTP servers 
	//$SMTP_username = 'admin@slsu-cen-moodle.org'; 	// SMTP username       
	//$SMTP_password = 'f2dy1234sf88';					// SMTP password
	//$SMTP_protocol = 'ssl';							// SMTP encryption ssl or tls accepted here	  
	//$SMTP_port = 465;									// SMTP Port number example 25, 465, 587						
				
?>