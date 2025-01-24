function validateRegistration() {
    var name = document.getElementById("name").value.trim();
    var gender = document.querySelector('input[name="gender"]:checked');
    var dob = document.getElementById("dob").value.trim();
    var phone = document.getElementById("phone").value.trim();
    var email = document.getElementById("email").value.trim();
    var address = document.getElementById("address").value.trim();
    var username = document.getElementById("username").value.trim();
    var password = document.getElementById("password").value;

    
    clearErrorMessages();

    
    if (name === '') {
        displayErrorMessage("name-error", "Please enter your name.");
        return false;
    }

    if (!gender) {
        displayErrorMessage("gender-error", "Please select your gender.");
        return false;
    }

    if (dob === '') {
        displayErrorMessage("dob-error", "Please enter your date of birth.");
        return false;
    }

    if (phone === '') {
        displayErrorMessage("phone-error", "Please enter your phone number.");
        return false;
    }

    if (email === '') {
        displayErrorMessage("email-error", "Please enter your email address.");
        return false;
    }

    if (address === '') {
        displayErrorMessage("address-error", "Please enter your address.");
        return false;
    }

    if (username === '') {
        displayErrorMessage("username-error", "Please enter a username.");
        return false;
    }

    if (password === '') {
        displayErrorMessage("password-error", "Please enter a password.");
        return false;
    }

    return true; 
}

function displayErrorMessage(elementId, message) {
    var errorElement = document.getElementById(elementId);
    if (errorElement) {
        errorElement.textContent = message;
    }
}

function clearErrorMessages() {
    var errorElements = document.getElementsByClassName("error-message");
    Array.from(errorElements).forEach(function(element) {
        element.textContent = "";
    });
}
