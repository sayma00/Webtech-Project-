<?php 

	require 'Connect.php';
	function registration($pname, $gen, $db, $e, $ph, $add, $user, $pass){
		$conn = connect();
		if($conn){
			$stmt = $conn->prepare("Insert INTO users (name , gender, dob, phone, email, address, username, password) VALUES(?,?,?,?,?,?,?,?)");
			$stmt->bind_param("ssssssss", $name , $gender, $dob, $phone, $email, $address, $username, $password);

			$name = $pname;
			$gender = $gen;
			$dob = $db;
			$address = $add;
			$email = $e;
			$phone = $ph;
			$username = $user;
			$password = $pass;
			
			$stmt->execute();
			return true;
		}
		else{
			return false;
		}
	}

	function checkUsername($name) {
    	$conn = connect();
    	if ($conn) {
        	$sql = "SELECT * FROM users WHERE username = '$name'";
        	$res = mysqli_query($conn, $sql);
			if ($res && mysqli_num_rows($res) > 0) {
            	return true;
	        } else {
	            return false;
	        }
    	}
    	return false;
	}


	function Checklogin($username, $password) {
		$conn = connect();
		if ($conn) {

			$sql = "SELECT id FROM users WHERE username = '" . $username . "' and password = '" . $password . "'";

			$res = mysqli_query($conn, $sql);

			if ($res->num_rows === 1)
				return true;
			return false;
		}
	}
	function viewprofile($username, $password) {
		$conn = connect();
		if ($conn) {
			$sql = "SELECT name , gender, dob, phone, email, address FROM users WHERE username = '" . $username . "' and password = '" . $password . "'";
			$res = mysqli_query($conn, $sql);
			$users = array();
			if ($res->num_rows > 0) {

				while($row = $res->fetch_assoc()) {
					array_push($users, $row);
				}
				return $users;
			}
		}
		return array();
	}

	function updateprofile($ph, $mail, $add, $uname){
		$conn = connect();

		if($conn){
			$sql = "UPDATE `users` SET `phone` = '$ph' , `email` = '$mail' , `address` = '$add' WHERE `username` = '$uname'";

			mysqli_query($conn, $sql);
			return true;
		}
		else{
			return false;
		}
	}

	function passwordchange($username, $oldpass, $newpass){

		$conn = connect();
		if($conn){
			$sql = "UPDATE `users` SET `password` = '$newpass' WHERE username = '" . $username . "' and password = '" . $oldpass . "'";
			mysqli_query($conn, $sql);

			return true;
		}

		return false;
	}

	function getSections()
	{
		$conn = connect();
		if ($conn) {
			$sql = "SELECT * FROM section";
			$res = mysqli_query($conn, $sql);
			$users = array();

			if ($res->num_rows > 0) {
				while($row = $res->fetch_assoc()) {
					array_push($users, $row);
				}
				return $users;
			}
		}
		return array();
	}

	
	

?>