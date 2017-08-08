<?php

class Model
{
	public function insert($book_name,$author_name,$publisher_name)
	{
		$conn = new mysqli("localhost","root","root","books");

		$insert = "INSERT INTO `library` (`book_name`,`author_name`,`publisher_name`) VALUES ('$book_name','$author_name','$publisher_name')";
		return $conn->query($insert);
	}

	public function update($book_name,$author_name,$publisher_name,$hid_id)
	{
		$conn = new mysqli("localhost","root","root","books");

		$update = "UPDATE `library` SET `book_name`='$book_name',`author_name`='$author_name',`publisher_name`='$publisher_name' WHERE `id` = ".$hid_id;
		return $conn->query($update);
	}

	public function search($search)
	{
		$conn = new mysqli("localhost","root","root","books");

		$search_name = "SELECT * FROM `library` WHERE `book_name` LIKE '%".$search."%' OR `author_name` LIKE '%".$search."%' OR `publisher_name` LIKE '%".$search."%'";
		$res = $conn->query($search_name);
		return $fetch_search = $res->fetch_array();
	}
}

