<!DOCTYPE html>
<html>
<head>
	<title>Books Management</title>
</head>
<body>
<center>
<h1>Add Books</h1>
<form method="post" action="controller.php">
	<table>
		<tr>
			<th>Book Name</th>
			<td><input type="text" name="book_name"></td>
		</tr>
		<tr>
			<th>Author</th>
			<td><input type="text" name="author"></td>
		</tr>
		<tr>
			<th>Publisher</th>
			<td><input type="text" name="publisher"></td>
		</tr>
		<tr>
			<td colspan="2" align="center"><input type="submit" name="submit"></td>
		</tr>
	</table>
</form>
</center>
</body>
</html>