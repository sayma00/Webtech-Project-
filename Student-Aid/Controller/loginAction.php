<?php 
	session_start();
	require('../model/User.php');
	$username = "";
	$password = "";
	$remem = "";
	if($_SERVER['REQUEST_METHOD'] === "POST"){
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$username = test_input($_POST['username']);
		$password = test_input($_POST['password']);
		$remem = $_POST['remember'];
		$message = "";
		if(empty($username)){
				$message .= "Username can't be Empty";
				$message .= "<br>";
			}
		if(empty($password)){
				$message .= "Password can't be Empty";
				$message .= "<br>";
		}
		if($message === ""){
			$flag = Checklogin($username, $password);
			$name = viewprofile($username, $password);
			$x = $name[0]['name'];
			if($flag){

				$_SESSION['auth'] = "Permit";
				$_SESSION['username'] = $username;
				$_SESSION['password'] = $password;
				$_SESSION['name'] = $x;

				if(!empty($_POST['remember'])) {
					$cookie_name = "username";
					$cookie_value = $username;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");
					$cookie_name = "password";
					$cookie_value = $password;
					setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/");

					header("Location: ../view/landing.php");
				}
				else {
					header("Location: ../view/landing.php");
				}

			}			
			else
			{
				$_SESSION['error'] = "Please correct your username/password";
				header("Location: ../view/login.php?login=failed");
			}
		}
		else
		{
			$_SESSION['error'] = $message;
			header("Location: ../view/adminlogin.php");
		}	
	}
?>