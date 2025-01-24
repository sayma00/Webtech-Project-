// JavaScript for form validation
function validateForm() {
    var username = document.getElementById('username').value.trim();
    var oldPass = document.getElementById('oldpass').value.trim();
    var newPass = document.getElementById('newpass').value.trim();
    var renewPass = document.getElementById('renewpass').value.trim();

    var usernameError = document.getElementById('usernameError');
    var oldPassError = document.getElementById('oldpassError');
    var newPassError = document.getElementById('newpassError');
    var renewPassError = document.getElementById('renewpassError');

    // Reset previous error messages
    usernameError.textContent = '';
    oldPassError.textContent = '';
    newPassError.textContent = '';
    renewPassError.textContent = '';

    var isValid = true;

    // Validation for username
    if (username === '') {
        usernameError.textContent = 'Please enter your username.';
        isValid = false;
    }

    // Validation for old password
    if (oldPass === '') {
        oldPassError.textContent = 'Please enter your old password.';
        isValid = false;
    }

    // Validation for new password
    if (newPass === '') {
        newPassError.textContent = 'Please enter a new password.';
        isValid = false;
    } else if (newPass.length < 5) {
        newPassError.textContent = 'New password must be at least 5 characters long.';
        isValid = false;
    }

    // Validation for re-entered new password
    if (renewPass === '') {
        renewPassError.textContent = 'Please re-enter your new password.';
        isValid = false;
    } else if (newPass !== renewPass) {
        renewPassError.textContent = 'Passwords do not match.';
        isValid = false;
    }

    return isValid;
}
