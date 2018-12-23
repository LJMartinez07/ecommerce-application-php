<?php 
	use ReCaptcha\ReCaptcha;
	require_once 'vendor/autoload.php';

	$recaptcha = new ReCaptcha('6LeqRl0UAAAAAI5uVMAmizbNShjL9ds-zabJZOHG');

	$response =$recaptcha->verify($_POST['g-recaptcha-response']);

 ?>
