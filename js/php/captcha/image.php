<?php

	// Begin the session
  	session_start();

  	// Create a random string, leaving out 'o' to avoid confusion with '0'
  	$char = strtoupper(substr(str_shuffle('abcdefghjkmnpqrstuvwxyz'), 0, 4));

  	// Concatenate the random string onto the random numbers
  	// '0' is left out to avoid confusion with 'O'
 	$str = rand(1, 7) . rand(1, 7) . $char;

  	// Set the session contents
  	$_SESSION['captcha_id'] = $str;

	// If the session is not present, set the variable to an error message

	if (!isset($_SESSION['captcha_id'])) {

		$str = 'ERROR!';

	} else { // Else if it is present, set the variable to the session

		$str = $_SESSION['captcha_id'];
	}

	// Set the content type
	header('Cache-control: no-cache');

	// Create an image from a png file
	$image = imagecreatefrompng('button.png');

	// Set the font colour
	$color = imagecolorallocate($image, 61, 58, 58);

	// Set the font
	$font = 'font/zxxnoise.otf';

	// Draw the image
	imagettftext($image, 20, 0, 20, 32, $color, $font, $str);

	header('Content-type: image/png');
	imagepng($image);
	imagedestroy($image);

?>