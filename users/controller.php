<?php

require_once("model.php");

class Control
{
	public function selectData($a,$b)
	{
		$mod2 = new Model;
		$success = $mod2->select($a,$b);

		if($success)
		{
			$_SESSION["username"] = $success["username"];
			$_SESSION["user_id"] = $success["id"];
			unset($_SESSION["error_msg"]);
			header("location:dashboard.php");
		}
		else
		{
			$_SESSION["error_msg"] = "Username And Password Does Not Match";
			header("location:login.php");
		}
	}

	public function inputData($table,$inputArray,$field)
	{
		$mod1 = new Model;
		$success = $mod1->input($table,$inputArray,$field);

		if($success == 2)
		{
			header("location:login.php");
		}
		else if($success == 3)
		{
			header("location:dashboard.php");
		}
	}

	/*public function inputData($img="",$a,$b,$c,$d,$e,$f="")
	{
		$mod1 = new Model;
		$success = $mod1->input($img,$a,$b,$c,$d,$e,$f);

		if($success == 2)
		{
			header("location:login.php");
		}
		else if($success == 3)
		{
			header("location:dashboard.php");
		}
	}*/
}

$control = new Control;

if(isset($_POST["submit"]))
{
	$username = $_POST["username"];
	$password = $_POST["pass"];

	$control->selectData($username,$password);
}

if(isset($_POST["submit2"]))
{
	$username = $_POST["username"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$addr = $_POST["address"];
	$password = $_POST["pass"];
	$hid_id = "";
	$img = "NULL";

	$table = "user";
	$inputArray = array("profile_image" => $img,"username" => $username,"name" => $name,"email" => $email,"address" => $addr,"password" => $password);
	$field = $hid_id;

	$control->inputData($table,$inputArray,$field);
	//$control->inputData($img,$username,$name,$email,$addr,$password,$hid_id);
}

if(isset($_POST["submit3"]))
{
	if($_FILES["profile_image"]["name"] != "")
	{
		$target = "image/";
		$image = $_FILES["profile_image"]["name"];
		$temp = $_FILES["profile_image"]["tmp_name"];
		$attach = $target.$image;
		move_uploaded_file($temp, $attach);
	}
	else
	{
		$image = $_POST["hid_image"];
	}

	$username = $_POST["username"];
	$name = $_POST["name"];
	$email = $_POST["email"];
	$addr = $_POST["address"];
	$password = $_POST["pass"];
	$hid_id = $_POST["hid_id"];

	$control->inputData($image,$username,$name,$email,$addr,$password,$hid_id);
}