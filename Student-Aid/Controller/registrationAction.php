<?php 
    require('../model/User.php');

    $name = $gender = $dob = $address = $email = $phone = $username = $password = "";
        if ($_SERVER['REQUEST_METHOD'] === "POST"){

            function test_input($data){
                $data = trim($data);
                $data = stripcslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            $name = test_input($_POST['name']);
            $gender = isset($_POST['gender']) ? test_input($_POST['gender']) : NULL;
            $dob = test_input($_POST['dob']);
            $address = test_input($_POST['address']);
            $email = test_input($_POST['email']);
            $phone = test_input($_POST['phone']);           
            $username = test_input($_POST['username']);
            $password = test_input($_POST['password']);

            $message = "";
            if(empty($name)) {

                $message .= "Name is Empty";
                $message .= "<br>";
            }
            else{
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                    $message .= " Name Only letters and spaces";
                    $message .= "<br>";
                }
            }
        
            if (empty($gender)) {
                $message .= "Gender not Selected";
                $message .= "<br>";
            }
            if (empty($dob)) {
                $message .= "Date of birth empty";
                $message .= "<br>";
            }
            
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
                $message .= "Mobileno is Empty";
                $message .= "<br>";
            }            
            if(empty($username)){
                $message .= "Username can't be Empty";
                $message .= "<br>";
            }
            if(empty($password)){
                $message .= "Password can't be Empty";
                $message .= "<br>";
            }
            if($message == ""){

                $checkUsername = checkUsername($username);

                if($checkUsername) {
                    header("Location: ../view/registration.php?registration=username");
                }

                else {

                    echo " ";

                    $flag = registration($name, $gender, $dob, $email, $phone, $address, $username, $password);

                    if($flag) {
                        header("Location: ../view/login.php?registration=success");
                    }
                    else {
                        header("Location: ../view/registration.php?registration=failed");
                    }
                }
            }
            else{
                $_SESSION['as'] = $message; 
                header("Location: ../view/registration.php");
            }
        }
?>