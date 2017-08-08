<?php

require_once("model.php");

class Books
{
	public function addBooks($a,$b,$c)
	{
		$mod1 = new Model();
		$success = $mod1->insert($a,$b,$c);

		if($success)
		{
			header("location:add_books.php");
		}
	}

	public function updateBooks($a,$b,$c,$d)
	{
		$mod2 = new Model();
		$success = $mod2->update($a,$b,$c,$d);

		if($success)
		{
			header("location:book_listing.php");
		}
	}

	public function searchBooks($a)
	{
		$mod3 = new Model();
		$success = $mod3->search($a);

		if($success)
		{
			header("location:book_listing.php?search=$a");
		}
		else
		{
			header("location:book_listing.php?search=not found");
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

if(isset($_POST["update"]))
{
	$book_name = $_POST["book_name"];
	$author_name = $_POST["author"];
	$publisher_name = $_POST["publisher"];
	$hid_id = $_POST["hid_id"];

	$books->updateBooks($book_name,$author_name,$publisher_name,$hid_id);
}

if(isset($_POST["search"]))
{
	$search_name = $_POST["search_value"];

	$books->searchBooks($search_name);
}