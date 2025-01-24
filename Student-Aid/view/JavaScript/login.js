function validateUsername() {
            var usernameInput = document.getElementById("username");
            var usernameValue = usernameInput.value.trim();
            var usernameError = document.getElementById("username-error");

            if (usernameValue === '') {
                usernameError.textContent = "Please enter a username.";
                usernameInput.focus();
                return false;
            } else {
                usernameError.textContent = "";
                return true;
            }
        }

        function validatePassword() {
            var passwordInput = document.getElementById("password");
            var passwordValue = passwordInput.value.trim();
            var passwordError = document.getElementById("password-error");

            if (passwordValue === '') {
                passwordError.textContent = "Please enter a password.";
                passwordInput.focus();
                return false;
            } else {
                passwordError.textContent = "";
                return true;
            }
        }

        function validateForm() {
            var isUsernameValid = validateUsername();
            var isPasswordValid = validatePassword();

            return isUsernameValid && isPasswordValid;
        }