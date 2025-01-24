<?php 
	session_start();
	include('../Controller/header.php');
	include('../Controller/authentication.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Change Password</title>
	<link rel="stylesheet" href="../view/CSS/changePasswordStyles.css">
    <script src="../view/JavaScript/changepassword.js"></script>
</head>
<body>
	<div class="changePassword">
        <form method="post" action="../Controller/changePasswordAction.php" novalidate onsubmit="return validateForm();">
            <fieldset>
                <legend>Change Password</legend>
                
                <label for="username">Username</label>
                <input type="text" name="username" id="username" value="<?php echo $_SESSION['username']; ?>" disabled>
                <span id="usernameError" class="error-message"></span>
                <br><br>

                <label for="oldpass">Old Password</label>
                <input type="password" id="oldpass" name="oldpass">
                <span id="oldpassError" class="error-message"></span>
                <br><br>

                <label for="newpass">New Password</label>
                <input type="password" id="newpass" name="newpass">
                <span id="newpassError" class="error-message"></span>
                <br><br>

                <label for="renewpass">Re-enter New Password</label>
                <input type="password" id="renewpass" name="renewpass">
                <span id="renewpassError" class="error-message"></span>
                <br><br>

                <input type="submit" name="submit" value="Change Password">
            </fieldset>
        </form>
    </div>
</body>


</html>





