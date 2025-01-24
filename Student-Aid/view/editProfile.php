<?php 
	session_start();
	include('../Controller/header.php');
	include('../Controller/authentication.php');
?>
<?php
	$x = $_SESSION['profileInfo'];
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Update Profile</title>
    <script src="../view/JavaScript/edit.js"></script>
    <style>
        label {
            display: block;
            margin-bottom: 8px;
            text-align: left;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-bottom: 15px;
        }

        .error-message {
            color: red;
            display: none;
            margin-top: 5px;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #0b6623;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #fca311;
        }

        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #708d81;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

    </style>
</head>
<body >
    <div class="profile-container">
        <form method="post" action="../Controller/editProfileAction.php" onsubmit="return validatePhone() && validateEmail() && validateAddress()" novalidate>
            <fieldset>
                <legend>Edit Profile</legend>
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $x[0]['name']; ?>" disabled>
                <br>

                <label>Gender</label>
                <input type="text" name="gender" value="<?php echo $x[0]['gender']; ?>" disabled>
                <br>

                <label>Date of Birth</label>
                <input type="text" name="dob" value="<?php echo $x[0]['dob']; ?>" disabled>
                <br>

                <label for="phone">Phone Number</label>
                <input type="text" id="phone" name="phone" value="<?php echo $x[0]['phone']; ?>">
                <span id="phoneError" class="error-message"></span>
                <br>
                
                <label for="email">Email</label>
                <input type="text" id="email" name="email" value="<?php echo $x[0]['email']; ?>">
                <span id="emailError" class="error-message"></span>
                <br>

                <label for="address">Address</label>
                <input type="text" id="address" name="address" value="<?php echo $x[0]['address']; ?>">
                <span id="addressError" class="error-message"></span>
                <br>
                        
                <label>Username</label>
                <input type="text" name="username" value="<?php echo htmlspecialchars($_SESSION['username']); ?>" disabled>
                <br>

                <input type="submit" name="submit" value="Update">
                <br>
                
            </fieldset>
        </form>
    </div>
    

</body>

</html>



