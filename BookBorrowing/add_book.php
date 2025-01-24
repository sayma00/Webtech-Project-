<?php
$servername = "localhost"; 
$username = "root";        
$password = "";            
$dbname = "library";       


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['addBook'])) {
  
    $book_title = $_POST['title'];
    $author_name = $_POST['author'];
    $isbn = $_POST['isbn'];
    $quantity = $_POST['quantity'];
    $category = $_POST['category'];

   
    $sql = "INSERT INTO books (book_title, author_name, ISBN, quantity, category) 
            VALUES (?, ?, ?, ?, ?)";

  
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssis", $book_title, $author_name, $isbn, $quantity, $category);

    if ($stmt->execute()) {
        echo "New book added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>