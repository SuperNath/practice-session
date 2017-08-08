<?php

session_start();

	$conn = new mysqli("localhost","root","root","user_manage");

	if(isset($_GET["id"]))
	{
		$delete_id = $_GET["id"];
		$delete = "DELETE FROM `user` WHERE `id` = ".$delete_id;
		$conn->query($delete);
		header("location:dashboard.php");
	}