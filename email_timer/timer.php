<?php
	//include_once("../../../../../usr/share/php/libphp-phpmailer/class.phpmailer.php");

	$dbconn = new mysqli("localhost","root","root","email_recieve");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Send</title>
	<script type="text/javascript">
		var i=0;
		
		function timer()
		{
			++i;

			if(i<61)
			{
				document.getElementById("timer").innerHTML = i;
			}
			else if(i == 61)
			{
				window.location.href = "timer.php?action=send";
			}
		}

		setInterval(function(){ timer(); },1000);

		function timerOut()
		{
			document.getElementById("send").style.display="none";
		}

		setTimeout(function(){ timerOut(); },5000);
	</script>
</head>
<body>
<center>
	<h1 style="font-size:100px;">Timer</h1>
	<span id="timer" style="font-size:120px;"></span>

	<?php
		// email send

	if(isset($_GET["action"]))
	{	
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

		/*$sql = "INSERT INTO `email_data` (`subject`,`body`) VALUES ('$mail->Subject','$mail->Body')";
		$dbconn->query($sql);*/

		//$mail->send();
		echo '<p id="send" style="color:green;font-weight:bold;font-size:120px;">Message has been sent</p>';
	}

	?>
</center>
</body>
</html>