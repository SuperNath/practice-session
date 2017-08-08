<?php
	$conn = new mysqli("localhost","root","root","books");

	if(isset($_GET["id"]))
	{
		$edit_id = $_GET["id"];
		$edit = "SELECT * FROM `library` WHERE `id` = ".$edit_id;
		$query = $conn->query($edit);
		$fetch = $query->fetch_array();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Books Management</title>
</head>
<body>

<center>
<h1>Edit Books</h1>
<form method="post" action="controller.php">
	<table>
		<tr>
			<th>Book Name</th>
			<td><input type="text" name="book_name" value="<?php echo $fetch["book_name"];?>"></td>
		</tr>
		<tr>
			<th>Author</th>
			<td><input type="text" name="author" value="<?php echo $fetch["author_name"];?>"></td>
		</tr>
		<tr>
			<th>Publisher</th>
			<td><input type="text" name="publisher" value="<?php echo $fetch["publisher_name"];?>"></td>
		</tr>
		<tr>
			<input type="hidden" name="hid_id" value="<?php echo $fetch[0]; ?>">
			<td colspan="2" align="center"><input type="submit" name="update" value="Update"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>