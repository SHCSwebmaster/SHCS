<?php

// Start Session
session_start();

// If it's correct, echo true,

if (strtoupper($_GET['captcha']) == $_SESSION['captcha_id']) {

	echo 'true';

} else {

	echo 'false';
}
?>