<?php
	session_start();
	$conn = new mysqli("localhost","root","root","user_manage");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
</head>
<body>
<a href="logout.php" style="text-align:right;">Logout</a>
<center>
<h1>Welcome <?php echo $_SESSION["username"]; ?></h1>

<?php
	if($_SESSION["username"] == "admin"){
?>
<table cellspacing="0" cellpadding="5" border="1">
	<tr>
		<th>Profile Image</th>
		<th>Username</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Action</th>
	</tr>
<?php
	$select = "SELECT * FROM `user`";
	$query = $conn->query($select);
	while($row = $query->fetch_array())
	{
?>
	<tr>
		<td><img src='image/<?php echo $row["profile_image"]; ?>' width='90' height='100' alt="no-image"></td>
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><?php echo $row["address"]; ?></td>
		<td>
			<a href="edit.php?id=<?php echo $row['id']; ?>">EDIT</a>
			<a href="delete.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Are You Sure To Delete?');">DELETE</a>
		</td>
	</tr>
<?php
	}
?>
</table>
<?php } else { ?>
<table cellspacing="0" cellpadding="5" border="1">
	<tr>
		<th>Profile Image</th>
		<th>Username</th>
		<th>Name</th>
		<th>Email</th>
		<th>Address</th>
		<th>Action</th>
	</tr>
<?php
	$select = "SELECT * FROM `user` WHERE `id` = ".$_SESSION["user_id"];
	$query = $conn->query($select);
	while($row = $query->fetch_array())
	{
?>
	<tr>
		<td><img src='image/<?php echo $row["profile_image"]; ?>' width='90' height='100' alt="no-image"></td>
		<td><?php echo $row["username"]; ?></td>
		<td><?php echo $row["name"]; ?></td>
		<td><?php echo $row["email"]; ?></td>
		<td><?php echo $row["address"]; ?></td>
		<td>
			<a href="edit.php?id=<?php echo $row['id']; ?>">EDIT</a>
		</td>
	</tr>
<?php
	}
?>
</table>
<?php } ?>
</center>
</body>
</html>