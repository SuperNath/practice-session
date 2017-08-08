<?php

$conn = new mysqli("localhost","root","root","books");

	if(isset($_GET["id"]))
	{
		$delete_id = $_GET["id"];
		$delete = "DELETE FROM `library` WHERE `id` = ".$delete_id;
		$conn->query($delete);
		header("location:book_listing.php");
	}