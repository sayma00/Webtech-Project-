<?php

require('../model/User.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    
    // Call the function to check if the username exists
    $exists = checkUsername($username);

    // Return response based on the result
    if ($exists) {
        echo 'exist'; // Username exists
    } else {
        echo 'available'; // Username is available
    }
}
?>
