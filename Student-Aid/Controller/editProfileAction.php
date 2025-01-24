<?php
	session_start();
	require('../model/User.php');
	include('authentication.php');
?>

<?php  
	$address = $email = $phone = "";
	if ($_SERVER['REQUEST_METHOD'] === "POST"){

			function test_input($data){
				$data = trim($data);
				$data = stripcslashes($data);
				$data = htmlspecialchars($data);
				return $data;
			}

			
			$phone = test_input($_POST['phone']);	
			$email = test_input($_POST['email']);
			$address = test_input($_POST['address']);

			$message = "";
			
			if (empty($address)) {
				$message .= "Street/House/Road is Empty";
				$message .= "<br>";
			}
			if (empty($email)) {
				$message .= "Email is Empty";
				$message .= "<br>";
			}
			else {
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$message .= "Please correct your email";
					$message .= "<br>";
				}
			}
			if (empty($phone)) {
				$message .= "Phone No is Empty";
				$message .= "<br>";
			}
			
		
			if ($message === ""){

				$user = $_SESSION['username'];
				$flag = updateprofile($phone, $email, $address, $user);
				
				if($flag) {

					$_SESSION['update'] = "Profile Updated Successfully";
					header("Location: ../Controller/viewProfileAction.php");
				}
				else {
					header("Location: ../Controller/editProfile.php?status=failed");
				}
			}
			else{
				$_SESSION['update'] = $message;
				header("Location: ../view/editProfile.php");
			}
	}
	


			
			
		

?>