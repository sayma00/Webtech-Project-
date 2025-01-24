<?php
function removeAllWhitespace($string)
{
    // Remove all types of whitespace using regex
    return preg_replace('/\s+/', '', $string);
}


$cookie_name = removeAllWhitespace($_POST['title']);
if (isset($_POST['submit']) && isset($_COOKIE[$cookie_name])) {
    echo "<h2>You cant borrow this Book Now</h2>";
} else {

    if (isset($_POST['submit'])) {

        $name = null;;
        $id = null;;
        $email = null;;
        $book = null;;
        $brDate = null;;
        $token = null;;
        $rtDate = null;;
        $book = $_POST['title'];
        $brDate = $_POST['date'];
        $token = $_POST['token'];


        // Name validation
        $NamePattern = "/^[A-Z a-z.,]*$/";
        if (preg_match($NamePattern, $_POST['name'])) {
            $name = $_POST['name'];
        } else {
            echo "<br><h3 style='color: green;'>Name format not matched only alphabet allowed(expect '.' ) and First letter should be capital </h3>";
        }

        $IdPattern = '/^\d{2}-\d{5}-\d{1}$/';
        if (preg_match($IdPattern, $_POST['id'])) {
            $id = $_POST['id'];
        } else {
            echo "<br><h3 style='color: green;'>invalied ID format</h3>";
        }


        $EmailPattern = "/^\d{2}-\d{5}-\d{1}@student\.aiub\.edu$/";
        if (preg_match($EmailPattern, $_POST['email'])) {
            $email = $_POST['email'];
        } else {
            echo "<br><h3 style='color: green;'>Email address format error</h3>";
        }



        $temp = $_POST['Rdate'];
        $borrowDate = new DateTime($brDate);
        $returnDate = new DateTime($temp);
        $interval = $borrowDate->diff($returnDate);
        $daysDifference = $interval->days;


        $json_data = file_get_contents('token.json');
        $data = json_decode($json_data, true);
        $used_json_data = file_get_contents('used.json');
        $used_data = json_decode($used_json_data, true);


        if (!isset($used_data['used'])) {
            $used_data['used'] = [];
        }

        if (in_array($token, $data['token']) && !in_array($token, $used_data['used'])) {
            $access = 1;
        } elseif (in_array($token, $data['token']) && in_array($token, $used_data['used'])) {
            $access = 2;
        } else {
            $access = 0;
        }

        // date validate
        if ($daysDifference > 10 && $access == 0) {
            echo " <br><h3 style='color: green;'>Invalid: Return date is more than 10 days after borrow date</h3>";
        }
        if ($daysDifference > 10 && $access == 2) {
            echo " <br><h3 style='color: green;'>Invalid: this Token already Used</h3>";
        } elseif ($daysDifference < 1) {
            echo " <br><h3 style='color: green;'>Invalid: Return date and Borrow date cannot be same day !</h3>";
        } else {
            $rtDate = $_POST['Rdate'];
        }


        
        if ($daysDifference > 10) {
            $key = array_search($token, $data['token']);
            if ($key !== false) {

                $used_data['used'][] = $token;

                file_put_contents('used.json', json_encode($used_data, JSON_PRETTY_PRINT));
            }
        }



$token = $_POST['token'];



        if ($id != null && $name != null && $email != null && $book != 'null' && $brDate !== null && $rtDate != null  && $daysDifference > 0 && ($daysDifference <= 10 || $daysDifference > 10 && $access == 1)) {
            $cookie_name = removeAllWhitespace($book);
            $cookie_value = $name;
            setcookie($cookie_name, $cookie_value, time() + 15);

            echo "
        <div class='Receipt'>
            <h2>Book Borrowing Receipt</h2>
            <p><span class='label'>Name:</span> <span class='value'>" . ($name) . "</span></p>
            <p><span class='label'>ID:</span> <span class='value'>" . ($id) . "</span></p>
            <p><span class='label'>Email:</span> <span class='value'>" . ($email) . "</span></p>
            <p><span class='label'>Chosen Book:</span> <span class='value'>" . ($book) . "</span></p>
            <p><span class='label'>Borrow Date:</span> <span class='value'>" . ($brDate) . "</span></p>
            <p><span class='label'>Token Number:</span> <span class='value'>" . ($token) . "</span></p>
            <p><span class='label'>Return Date:</span> <span class='value'>" . ($rtDate) . "</span></p>
        </div>";
        } else {
            echo "<br><h2 style='color: green;'>Please provide all information !</h2>";
        }
    }
}
?>


<style>
    .Receipt {
        font-family: Arial, sans-serif;
        max-width: 500px;
        margin: 20px auto;
        padding: 20px;
        border: 5px solid lightgreen;
        border-radius: 10px;
        background-color: violet;
        color: white;
    }

    .Receipt h2 {
        text-align: center;
    }

    .Receipt p {
        margin: 10px 0;
    }

    .Receipt .label {
        font-weight: bold;
    }
</style>