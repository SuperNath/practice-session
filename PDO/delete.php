<?php

	$username = "root";
	$password = "root";
	$dbname = "books";
	$servername = "localhost";

	$pdo = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];
		$edit = $pdo->prepare("DELETE FROM `library` WHERE `id` = $id"); 
		$edit->execute();
		header("location:form.php");
	}