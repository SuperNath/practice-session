<?php

require_once("model.php");

/*$username = "root";
$password = "root";
$dbname = "books";
$servername = "localhost";*/

/*try
{
	$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
	echo "Connected To The Database<br>";

	$sql = "SELECT * FROM `library`";
	foreach($pdo->query($sql) as $result)
	{
		echo "<p style='color:red;font-weight:bold;'>".ucwords($result["book_name"])."</p>";
	}
	$pdo = null;
}
catch(PDOException $e)
{
   echo $e->getMessage();
}*/

class Book
{
	public function insert($a,$b,$c)
	{
		$mod = new Model;
		$succ = $mod->insert($a,$b,$c);

		if($succ)
		{
			header("location:form.php");
		}
	}

	public function update($a,$b,$c,$d)
	{
		$mod1 = new Model;
		$succ = $mod1->update($a,$b,$c,$d);

		if($succ)
		{
			header("location:form.php");
		}
	}
}

$bk = new Book;

if(isset($_POST["sub"]))
{
	$bkName = $_POST["book_name"];
	$authName = $_POST["author_name"];
	$pubName = $_POST["publisher_name"];

	$bk->insert($bkName,$authName,$pubName);
}

if(isset($_POST["upd"]))
{
	$bkName = $_POST["book_name"];
	$authName = $_POST["author_name"];
	$pubName = $_POST["publisher_name"];
	$hid_id = $_POST["hid_id"];

	$bk->update($bkName,$authName,$pubName,$hid_id);
}