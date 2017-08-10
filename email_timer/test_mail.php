<?php

error_reporting(-1);
ini_set('display_errors','ON');

		// email send

	include_once("../../../../../usr/share/php/libphp-phpmailer/class.phpmailer.php");
	//require 'system/includes/PHPMailer/PHPMailerAutoload.php';

	
	$mail = new PHPMailer();

	$mail->isSMTP();                                 
	$mail->Host = 'smtp.gmail.com';  		
	$mail->SMTPAuth = true;                              
	$mail->Username = 'vyrazulabs@gmail.com';            
	$mail->Password = 'VasuNaman';                           
	$mail->SMTPSecure = 'ssl';                
	$mail->Port = 465;                                    

	$mail->From = 'vyrazulabs@gmail.com';
	$mail->FromName = 'Mailer';
	$mail->addAddress('vyrazulabs@gmail.com', 'Vasu Naman');  

	//Send HTML or Plain Text email
	$mail->isHTML(true);

	$mail->Subject = 'New Mail';
	$mail->Body    = '<b> Supratik Nath </b>';
	$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

	if(!$mail->send()) {
	   echo 'Message could not be sent.';
	   echo 'Mailer Error: ' . $mail->ErrorInfo;
	   exit;
	}

	//$mail->send();
	echo '<p id="">Message has been sent</p>';
	
?>