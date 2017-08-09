<?php

	$username = "root";
	$password = "root";
	$dbname = "books";
	$servername = "localhost";

	$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$edit = $pdo->prepare("SELECT * FROM `library` WHERE `id` = $id"); 
		$edit->execute();
		$fetch = $edit->fetch();
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Insert Form</title>
</head>
<body>
<center>
<h1>Add Books</h1>
<form method="post" action="connection.php" style="margin-bottom:50px;">
	<table>
		<tr>
			<th>Book Name</th>
			<td><input type="text" name="book_name" value="<?php if(isset($_GET["id"])){ echo $fetch['book_name']; } ?>"></td>
		</tr>
		<tr>
			<th>Author Name</th>
			<td><input type="text" name="author_name" value="<?php if(isset($_GET["id"])){ echo $fetch['author_name']; } ?>"></td>
		</tr>
		<tr>
			<th>Publisher Name</th>
			<td><input type="text" name="publisher_name" value="<?php if(isset($_GET["id"])){ echo $fetch['publisher_name']; } ?>"></td>
		</tr>
		<tr>
			<?php
				if(isset($_GET["id"]))
				{
			?>
				<input type="hidden" name="hid_id" value="<?php echo $fetch[0]; ?>">
			<?php
				}
			?>
			<td colspan="2" align="center">
				<input type="submit" name="<?php if(isset($_GET["id"])){ echo "upd"; }else{ echo "sub"; } ?>" value="<?php if(isset($_GET["id"])){ echo "Update"; }else{ echo "Submit"; } ?>">
			</td>
		</tr>
	</table>
</form>
</center>
</body>
</html>
<?php
	require_once("model.php");

	$bk1 = new Model;
	$bk1->fetch_result();
?>