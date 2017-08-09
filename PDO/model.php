<?php

class Model
{
	public function fetch_result()
	{
		$username = "root";
		$password = "root";
		$dbname = "books";
		$servername = "localhost";

		try
		{
			$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
			//echo "Connected To The Database<br>";

			echo "<table cellpadding='5' cellspacing='0' border='1' align='center'>
					<tr>
						<th>Book Name</th>
						<th>Author Name</th>
						<th>Publisher Name</th>
						<th>Action</th>
					</tr>";

			$sql = "SELECT * FROM `library`";
			foreach($pdo->query($sql) as $result)
			{
				echo "<tr>";
				echo "<td>".ucwords($result["book_name"])."</td>";
				echo "<td>".ucwords($result["author_name"])."</td>";
				echo "<td>".ucwords($result["publisher_name"])."</td>";
				echo "<td>
						<a href='form.php?id=".$result[0]."'>EDIT</a>
						<a href='delete.php?id=".$result[0]."' onclick='return confirm(\"Are You Sure To Delete?\")'>DELETE</a>
					</td>";
				echo "</tr>";
				
			}
			$pdo = null;
		}
		catch(PDOException $e)
		{
		   echo $e->getMessage();
		}
	}

	public function insert($book_name,$author_name,$publisher_name)
	{
		$username = "root";
		$password = "root";
		$dbname = "books";
		$servername = "localhost";

		try
		{
			$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
			//echo "Connected To The Database<br>";

			$sql = "INSERT INTO `library` (`book_name`,`author_name`,`publisher_name`) VALUES ('$book_name','$author_name','$publisher_name')";
			$query = $pdo->query($sql);
			return true;
		}
		catch(PDOException $e)
		{
		   echo $e->getMessage();
		   return false;
		}
	}

	public function update($book_name,$author_name,$publisher_name,$hid_id)
	{
		$username = "root";
		$password = "root";
		$dbname = "books";
		$servername = "localhost";

		try
		{
			$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
			//echo "Connected To The Database<br>";

			$sql = "UPDATE `library` SET `book_name`='$book_name',`author_name`='$author_name',`publisher_name`='$publisher_name' WHERE `id` = ".$hid_id;
			$query = $pdo->query($sql);
			return true;
		}
		catch(PDOException $e)
		{
		   echo $e->getMessage();
		   return false;
		}
	}
}