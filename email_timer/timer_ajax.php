<?php
	//include_once("../../../../../usr/share/php/libphp-phpmailer/class.phpmailer.php");

	$dbconn = new mysqli("localhost","root","root","email_recieve");
?>
<html>
<head>
	<title>Email Send</title>
	<script type="text/javascript" src="jquery.min.js"></script>
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
				i=0;
				$.ajax({
					url:"test_mail.php",
					success:function(message)
					{
						$("#sent").show();
						$("#sent").html(message).delay(4000).hide(1);
					}
				});
			}
		}

		setInterval(function(){ timer(); },1000);
	</script>
</head>
<body>
<center>
	<h1 style="font-size:100px;">Timer</h1>
	<span id="timer" style="font-size:120px;"></span>
	<p id="sent" style="color:green;font-weight:bold;font-size:120px;"></p>
</center>
</body>
</html>