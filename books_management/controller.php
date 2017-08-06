<?php

class Books
{
	public function __construct()
	{
		$local = "localhost";
		$db = "books";
		$user = "root";
		$pass = "";

		try
		{
			$conn = new PDO("mysql:host = $local;dbname = $db",$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			//echo "Connected Successfully";
		}
		catch(PDOException $e)
		{
			echo "Connection Failed:".$e->getMessage();
		}
	}

	public function addBooks($book_name,$author_name,$publisher_name)
	{
		$local = "localhost";
		$db = "books";
		$user = "root";
		$pass = "";

		try
		{
			$conn = new PDO("mysql:host = $local;dbname = $db",$user,$pass);
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$insert = "INSERT INTO `library` (`book_name`,`author_name`,`publisher_name`) VALUES ('$book_name','$author_name','$publisher_name')";
			$conn->exec($insert);
		}
		catch(PDOException $e)
	    {
	    	echo $insert."<br>".$e->getMessage();
	    }
	}
}

$books = new Books();

if(isset($_POST["submit"]))
{
	$book_name = $_POST["book_name"];
	$author_name = $_POST["author"];
	$publisher_name = $_POST["publisher"];

	$books->addBooks($book_name,$author_name,$publisher_name);
}