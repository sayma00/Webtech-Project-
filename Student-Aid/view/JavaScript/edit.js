// validation.js

function validatePhone() {
    let phoneInput = document.getElementById('phone');
    let phoneValue = phoneInput.value.trim();
    let phoneError = document.getElementById('phoneError');

    if (!/^\d+$/.test(phoneValue)) {
        phoneError.textContent = 'Please enter a valid phone number.';
        phoneError.style.display = 'block';
        phoneInput.focus();
        return false;
    } else {
        phoneError.style.display = 'none';
        return true;
    }
}

function validateEmail() {
    let emailInput = document.getElementById('email');
    let emailValue = emailInput.value.trim();
    let emailError = document.getElementById('emailError');

    if (!/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/.test(emailValue)) {
        emailError.textContent = 'Please enter a valid email address.';
        emailError.style.display = 'block';
        emailInput.focus();
        return false;
    } else {
        emailError.style.display = 'none';
        return true;
    }
}

function validateAddress() {
    let addressInput = document.getElementById('address');
    let addressValue = addressInput.value.trim();
    let addressError = document.getElementById('addressError');

    if (addressValue === '') {
        addressError.textContent = 'Please enter your address.';
        addressError.style.display = 'block';
        addressInput.focus();
        return false;
    } else {
        addressError.style.display = 'none';
        return true;
    }
}
