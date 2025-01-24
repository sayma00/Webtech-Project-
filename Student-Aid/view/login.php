<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="JavaScript/login.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #708d81;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
    <script>
        function showRegistrationMessage() {
            const urlParams = new URLSearchParams(window.location.search);
            const registrationStatus = urlParams.get('registration');
            if (registrationStatus === 'success') {
                alert("Registration Successful!");
            } else if (registrationStatus === 'failed') {
                alert("Registration Failed. Please try again.");
            }
        }
        function showLoginMessage() {
            const urlParams = new URLSearchParams(window.location.search);
            const loginStatus = urlParams.get('login');
            if (loginStatus === 'success') {
                alert("Successful!");
            } else if (loginStatus === 'failed') {
                alert("Username/Password incorrect. Correct and Please try again.");
            }
        }
        function showAuth() {
            const urlParams = new URLSearchParams(window.location.search);
            const loginAuth = urlParams.get('loginstatus');
            console.log(" ");
            console.log(loginAuth);
            if (loginAuth === 'unauthorised') {
                alert("You are not logged in. Login to access.");
            }
        }
    </script>
</head>
<body>
    <div class="login-form">
        <form method="post" action="../Controller/loginAction.php" onsubmit="return validateForm()" novalidate>
            <fieldset>
                <legend>Login page</legend>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Enter Username" value="<?php if(isset($_COOKIE['username'])) {echo $_COOKIE['username']; } ?>">
                <span id="username-error" class="error-message"></span>
                
                <br><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Enter Password" value="<?php if(isset($_COOKIE['password'])) {echo $_COOKIE['password']; } ?>">
                <span id="password-error" class="error-message"></span>

                <br><br>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            
                <br><br>
                <input type="submit" name="submit" value="Login">
                <br><br>
                <p>Don't have an account? <a href="registration.php">Click here for Sign up!</a></p>
                
            </fieldset>
        </form>
    </div>
</body>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        showAuth();
        showRegistrationMessage();
        showLoginMessage();
    });
</script>
</html>
