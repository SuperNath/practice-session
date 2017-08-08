<?php
	$conn = new mysqli("localhost","root","root","books");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Book Listing</title>
</head>
<body>
<a href="add_books.php">Add Books</a>
<center>
<form method="post" action="controller.php" style="margin-bottom:20px;">
	<input type="text" name="search_value" placeholder="search books,publisher,author">
	<input type="submit" name="search" value="Search">
</form>
<table cellspacing="0" cellpadding="5" border="1">
	<tr>
		<th>Book Name</th>
		<th>Author Name</th>
		<th>Publisher Name</th>
		<th>Action</th>
	</tr>
<?php
	if(isset($_GET["search"]))
	{
		$search = $_GET["search"];

		if($search != "not found"){

		$sql2 = "SELECT * FROM `library` WHERE `book_name` LIKE '%".$search."%' OR `author_name` LIKE '%".$search."%' OR `publisher_name` LIKE '%".$search."%'";
		$query2 = $conn->query($sql2);
		while($row2 = $query2->fetch_array())
		{
?>
		<tr>
			<td><?php echo $row2["book_name"]?></td>
			<td><?php echo $row2["author_name"]?></td>
			<td><?php echo $row2["publisher_name"]?></td>
			<td>
				<a href="edit.php?id=<?php echo $row2[0]; ?>">EDIT</a>
				<a href="delete.php?id=<?php echo $row2[0]; ?>" onclick="return confirm('Are You Sure To Delete?');">DELETE</a>
			</td>
		</tr>
<?php
			}
		}
		else
		{
			echo "<tr><td colspan='4' align='center'>".ucwords(str_replace("%20"," ",$_GET["search"]))."</td></tr>";
		}
		
	}
	else
	{
		$sql = "SELECT * FROM `library`";
		$query = $conn->query($sql);
		while($row = $query->fetch_array())
		{
?>
		<tr>
			<td><?php echo $row["book_name"]?></td>
			<td><?php echo $row["author_name"]?></td>
			<td><?php echo $row["publisher_name"]?></td>
			<td>
				<a href="edit.php?id=<?php echo $row[0]; ?>">EDIT</a>
				<a href="delete.php?id=<?php echo $row[0]; ?>" onclick="return confirm('Are You Sure To Delete?');">DELETE</a>
			</td>
		</tr>
<?php
		}
	}
?>
</table>
</center>
</body>
</html>