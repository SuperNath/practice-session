<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Management</title>
</head>
<body>
<a href="register.php" style="text-align: right;">Register</a>
<center>
<h1>Login</h1>
<span style='color:red;'><?php if(isset($_SESSION["error_msg"])){ echo $_SESSION["error_msg"]; } ?></span>
<form method="post" action="controller.php" autocomplete="off">
	<table>
		<tr>
			<th>Username</th>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><input type="password" name="pass"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>