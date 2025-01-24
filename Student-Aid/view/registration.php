<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Registration</title>
    <link rel="stylesheet" type="text/css" href="CSS/styles.css">
    <script src="JavaScript/registration.js"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #708d81;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
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
        function showUsernameMessage() {
            const urlParams = new URLSearchParams(window.location.search);
            const registrationStatus = urlParams.get('registration');
            if (registrationStatus === 'username') {
                alert("Username Already Exist");
            } else if (registrationStatus === 'failed') {
                alert("Registration Failed. Please try again.");
            }
        }
        window.onload = showRegistrationMessage;
        //window.onload = showUsernameMessage;
    </script>
</head>
<body>
    <div class="registration-form">
        <form method="post" action="../Controller/registrationAction.php" onsubmit="return validateRegistration()" novalidate>
            <fieldset>
                <legend>User Registration</legend>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" placeholder="Enter Your Name">
                <span id="name-error" class="error-message"></span>

                <br><br>
                <label for="gender" style="display: inline-block; margin-bottom: 8px;">Gender</label>
                <input type="radio" name="gender" value="male" id="gender-male">
                <label for="gender-male" style="display: inline-block; margin-right: 10px;">Male</label>
                <input type="radio" name="gender" value="female" id="gender-female">
                <label for="gender-female" style="display: inline-block; margin-right: 10px;">Female</label>
                <span id="gender-error" class="error-message"></span>


                <br><br>
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="dob">
                <span id="dob-error" class="error-message"></span>

                <br><br>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" placeholder="Enter Your Phone Number">
                <span id="phone-error" class="error-message"></span>

                <br><br>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="Enter Your Email Address">
                <span id="email-error" class="error-message"></span>

                <br><br>
                <label for="address">Address</label>
                <textarea name="address" id="address" placeholder="Enter Your Address" rows="4"></textarea>
                <span id="address-error" class="error-message"></span>

                <br><br>
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Choose a Username">
                <span id="username-error" class="error-message"></span>
                <span id="usernameError" style="color: red;"></span>

                <br><br>
                <label for="password">Password</label>
                <input type="password" name="password" id="password" placeholder="Choose a Password">
                <span id="password-error" class="error-message"></span>

                <br><br>
                <input type="submit" name="submit" value="Register">
                <br><br>
                <p>Already have an account? <a href="login.php">Login here</a></p>
            </fieldset>
        </form>
    </div>

  
<script>
  $(document).ready(function(){
    $('#username').on("keyup", function(){
      var getUsername = $(this).val();
      $.ajax({
        method: 'POST',
        url: '../Controller/checkUsernameAction.php',
        data: { username: getUsername },
        success: function(response) {
          if (response == 'exist') {
            $('#usernameError').text("Username not available").show();
          } else {
            $('#usernameError').text("Username available").show();
          }
        }
      });
    });
  });
</script>




</body>
</html>




