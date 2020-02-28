<?php

if( isset($_POST['submitform']) ){

	//form validation vars

	$formok = true;

	$errors = array();


	//sumbission data

	$ipaddress = $_SERVER['REMOTE_ADDR'];

	$date = date('d/m/Y');

	$time = date('H:i:s');

	

	//form data

	$name = $_POST['name'];	

	$email = $_POST['email'];

	$message = $_POST['message'];

	
	//validate form data

	//validate name is not empty

	if(empty($name)){

		$formok = false;

		$errors[] = "Bitte geben Sie Ihren Name ein.";

		//echo "Bitte geben Sie Ihren Name ein.";

	}

	//validate email address is not empty

	if(empty($email)){

		$formok = false;

		$errors[] = "You have not entered an email address";

		//echo "Bitte geben Sie Ihren Email ein.";

	//validate email address is valid

	}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){

		$formok = false;

		$errors[] = "Bitte geben Sie eine gültige Email ein.";

		//echo "Bitte geben Sie eine gültige Email ein.";

	}

	

	//validate message is not empty

	if(empty($message)){

		$formok = false;

		$errors[] = "Sie haben keine Nachrichten geschrieben";

		//echo "Sie haben keine Nachrichten geschrieben";

	}

	//validate message is greater than 10 charcters

	elseif(strlen($message) < 10){

		$formok = false;

		$errors[] = "Die Nachricht muss größer als 10 Buchstaben enthält";

		//echo "Die Nachricht muss größer als 10 Buchstaben enthält";

	}


	//send email if all is ok

	if($formok){

		$headers = "From: info@vipassana-karlsruhe.de" . "\r\n";

		$headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

		$emailbody = "<p>Eine neue Kontaktanfrage ist angekommen.</p>

					  <p><strong>Name: </strong> {$name} </p>

					  <p><strong>Email Address: </strong> {$email} </p>

					  <p><strong>Nachrichten: </strong> {$message} <br> </p>

					  <p>Diese Nachrichten wurde von diese IP-Adresse gesendet: {$ipaddress} on {$date} at {$time}. <br>

                 Dies ist eine Benachrichtigung. Bitte beantworten Sie diese Email nicht.</p>";

		

		mail("info@vipassana-karlsruhe.info","Neue Kontaktanfrage von der Vipassana Website",$emailbody,$headers);

	}

	$ch = curl_init();

	$respondURL = $_SERVER['SERVER_NAME'];

	if(empty($errors))

	{

		curl_setopt($ch, CURLOPT_URL, $respondURL."/erfolg");

	}

	else{

	// set URL and other appropriate options

		curl_setopt($ch, CURLOPT_URL, $respondURL."/fehler");	

	}

	curl_setopt($ch, CURLOPT_HEADER, 0);



	// grab URL and pass it to the browser

	curl_exec($ch);



	// close cURL resource, and free up system resources

	curl_close($ch);

	

	//what we need to return back to our form

	$returndata = array(

		'posted_form_data' => array(

			'name' => $name,

			'email' => $email,

			'telephone' => $telephone,

			'message' => $message

		),

		'form_ok' => $formok,

		'errors' => $errors

	);

	

	//if this is not an ajax request

	if(empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) !== 'xmlhttprequest'){

		//set session variables

		session_start();

		$_SESSION['cf_returndata'] = $returndata;

		

		//redirect back to form

		header('location: ' . $_SERVER['HTTP_REFERER']);

	}

}

