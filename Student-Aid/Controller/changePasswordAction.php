
<?php

	require('../model/User.php');
	session_start();

	$password = $newpass = $renewpassword = "";

	if($_SERVER['REQUEST_METHOD'] === "POST"){

		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		
		$password = test_input($_POST['oldpass']);
		$newpass = test_input($_POST['newpass']);
		$renewpassword = test_input($_POST['renewpass']);

		$message = "";
	
		if(empty($password)){
			$message .= "Fillup old password";
			$message .= "<br>";
		}

		if(empty($newpass)){
			$message .= "Fillup new password";
			$message .= "<br>";
		}

		if(!empty($renewpassword)) {
			if($newpass != $renewpassword){
				$message .= "New and New Re-enter Password not matched";
			}
		}
		

		if($message == ""){

			$check = passwordchange($_SESSION['username'], $password, $newpass);
			if($check){
				header("Location: ../view/login.php");
			}
			else{
				//header("Location: ../view/adminchangepassword.php?password=failed");
			}
		}
		else{
			echo "$message";
		}	
	}

?>