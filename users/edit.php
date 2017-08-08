<?php
	session_start();

	$conn = new mysqli("localhost","root","root","user_manage");

	if(isset($_GET["id"]))
	{
		$edit_id = $_GET["id"];
		$edit = "SELECT * FROM `user` WHERE `id` = ".$edit_id;
		$edit_query = $conn->query($edit);
		$fetch_data = $edit_query->fetch_array();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User Profile</title>
</head>
<body>
<center>
<h1>Profile</h1>
<form method="post" action="controller.php" enctype="multipart/form-data">
	<table cellpadding="5" cellspacing="0" border="0">
		<tr>
			<th>Profile Image</th>
			<td><input type="file" name="profile_image"></td>
		</tr>
		<tr>
			<th>Username</th>
			<td><input type="text" name="username" value="<?php if(isset($_GET['id'])){ echo $fetch_data['username']; } ?>"></td>
		</tr>
		<tr>
			<th>Name</th>
			<td><input type="text" name="name" value="<?php if(isset($_GET['id'])){ echo $fetch_data['name']; } ?>"></td>
		</tr>
		<tr>
			<th>Email</th>
			<td><input type="text" name="email" value="<?php if(isset($_GET['id'])){ echo $fetch_data['email']; } ?>"></td>
		</tr>
		<tr>
			<th>Address</th>
			<td><input type="text" name="address" value="<?php if(isset($_GET['id'])){ echo $fetch_data['address']; } ?>"></td>
		</tr>
		<?php
			if($_SESSION["username"] != "admin"){
		?>
		<tr>
			<th>Password</th>
			<td><input type="text" name="pass" value="<?php if(isset($_GET['id'])){ echo $fetch_data['password']; } ?>"></td>
		</tr>
		<?php } ?>
		<tr>
			<input type="hidden" name="hid_id" value="<?php if(isset($_GET['id'])){ echo $fetch_data['id']; } ?>">
			<input type="hidden" name="hid_image" value="<?php if(isset($_GET['id'])){ echo $fetch_data['profile_image']; } ?>">
			<td colspan="2" align="center"><input type="submit" name="submit3" value="Update"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>