<?php

session_start();

class Model
{
	public function select($username,$password)
	{
		$conn = new mysqli("localhost","root","root","user_manage");

		if($username == "admin")
		{
			$select = "SELECT * FROM `admin` WHERE `username` = '$username' AND `password` = '$password'";
			$query = $conn->query($select);
			$num = $query->num_rows;

			if($num == 1)
			{
				return $result = $query->fetch_assoc();
			}
		}
		else
		{
			$select = "SELECT * FROM `user` WHERE `username` = '$username' AND `password` = '$password'";
			$query = $conn->query($select);
			$num = $query->num_rows;

			if($num == 1)
			{
				return $result = $query->fetch_assoc();
			}
		}
	}

	public function input($table,$inputArray,$field)
	{
		$conn = new mysqli("localhost","root","root","user_manage");

		if($field == "")
		{
			$inArr = array();
			foreach($inputArray as $key=>$val)
			{
				array_push($inArr,$key ."=". $val);
			}

			$imp =
			/*$input = "INSERT INTO `user` (`profile_image`,`username`,`name`,`email`,`address`,`password`) VALUES ('NULL','$username','$name','$email','$address','$password')";
			$conn->query($input);
			return 2;*/
		}
		/*else
		{
			if($password == "")
			{
				$update = "UPDATE `user` SET `profile_image`='$img',`username`='$username',`name`='$name',`email`='$email',`address`='$address' WHERE `id` = ".$hid_id;
				$conn->query($update);
				return 3;
			}
			else
			{
				$update = "UPDATE `user` SET `profile_image`='$img',`username`='$username',`name`='$name',`email`='$email',`address`='$address',`password`='$password' WHERE `id` = ".$hid_id;
				$conn->query($update);
				return 3;
			}
		}*/
	}

	/*public function input($img="",$username,$name,$email,$address,$password,$hid_id="")
	{
		$conn = new mysqli("localhost","root","root","user_manage");

		if($hid_id == "")
		{
			$input = "INSERT INTO `user` (`profile_image`,`username`,`name`,`email`,`address`,`password`) VALUES ('NULL','$username','$name','$email','$address','$password')";
			$conn->query($input);
			return 2;
		}
		else
		{
			if($password == "")
			{
				$update = "UPDATE `user` SET `profile_image`='$img',`username`='$username',`name`='$name',`email`='$email',`address`='$address' WHERE `id` = ".$hid_id;
				$conn->query($update);
				return 3;
			}
			else
			{
				$update = "UPDATE `user` SET `profile_image`='$img',`username`='$username',`name`='$name',`email`='$email',`address`='$address',`password`='$password' WHERE `id` = ".$hid_id;
				$conn->query($update);
				return 3;
			}
		}
	}*/
}

