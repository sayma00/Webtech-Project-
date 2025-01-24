<!DOCTYPE html>
<html lang = "en">
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body >
        <h1>Book Borrowing Management</h1>
        <p style="text-align:center;">
            <img src="Screenshot 2024-11-06 142037.png">
        </p>
        <?php
    // Database connection
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "library";

             $conn = new mysqli('localhost', 'root', '', 'library');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }
            ?>
        <div class="main">
            <div class="left">
                
        <?php
            $usedJsonData = file_get_contents('used.json');

            $usedData = json_decode($usedJsonData, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
            echo "Error decoding JSON: " . json_last_error_msg();
            exit;
            }

            echo "<h3>Used Tokens</h3>";
            if (!empty($usedData['used'])) {
               echo "<ul>";
            foreach ($usedData['used'] as $token) {
              echo "<li>" . htmlspecialchars($token) . "</li>";
            }
                echo "</ul>";
            } else {
                echo "<p>No tokens used yet.</p>";
            }
            ?>

            </div>
            
        <div class ="middle">
            <div class="first">
            <?php
            // Database connection settings
            $servername = "localhost"; // Change this to your database server (e.g., 'localhost')
            $username = "root";        // Your MySQL username
            $password = "";            // Your MySQL password
            $dbname = "library";       // The database where your 'books' table exists

            // Create a connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check the connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Query to fetch books
            $sql = "SELECT * FROM books";
            $result = $conn->query($sql);
            ?>

            <div class="box1">
                <h4>Books in Database</h4>
                <?php if ($result->num_rows > 0): ?>
                    <table border = 1 cellpadding="1">
                        <tr>
                            <th>Book Title</th>
                            <th>Author Name</th>
                            <th>ISBN</th>
                            <th>Quantity</th>
                            <th>Category</th>
                        </tr>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                                <td><?php echo htmlspecialchars($row['author_name']); ?></td>
                                <td><?php echo htmlspecialchars($row['ISBN']); ?></td>
                                <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                                <td><?php echo htmlspecialchars($row['category']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    </table>
                <?php else: ?>
                    <p>No books found in the database.</p>
                <?php endif; ?>
            </div>

            <?php
            // Close the database connection
            $conn->close();
            ?>

                <div class="box2">Edit Book Info
<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "library";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle delete action
if (isset($_POST['deleteBook'])) {
    $book_id = $_POST['book_id'];
    $sql = "DELETE FROM books WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $book_id);
    if ($stmt->execute()) {
        echo "Book deleted successfully!";
    } else {
        echo "Error deleting book: " . $stmt->error;
    }
    $stmt->close();
}

// Handle update action (only name and quantity)
if (isset($_POST['updateBook'])) {
    $book_id = $_POST['book_id'];
    $new_name = $_POST['new_name'];
    $new_quantity = $_POST['new_quantity'];

    $sql = "UPDATE books SET book_title = ?, quantity = ? WHERE book_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sii", $new_name, $new_quantity, $book_id);
    if ($stmt->execute()) {
        echo "Book updated successfully!";
    } else {
        echo "Error updating book: " . $stmt->error;
    }
    $stmt->close();
}

// Query to fetch books
$sql = "SELECT * FROM books";
$result = $conn->query($sql);
?>

<?php if ($result->num_rows > 0): ?>
    <form method="POST" action="">
        <table border="1" cellpadding="5">
            <tr>
                <th>Book Title</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['book_title']); ?></td>
                    <td><?php echo htmlspecialchars($row['quantity']); ?></td>
                    <td>
                        <!-- Delete form -->
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                            <button type="submit" name="deleteBook">Delete</button>
                        </form><br>

                        <!-- Update form -->
                        <form method="POST" action="" style="display:inline;">
                            <input type="hidden" name="book_id" value="<?php echo $row['book_id']; ?>">
                            <input type="text" name="new_name" placeholder="New Name" value="<?php echo htmlspecialchars($row['book_title']); ?>" required>
                            <input type="number" name="new_quantity" placeholder="New Quantity" value="<?php echo htmlspecialchars($row['quantity']); ?>" required>
                            <button type="submit" name="updateBook">Update</button>
                        </form>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    </form>
<?php else: ?>
    <p>No books found in the database.</p>
<?php endif; ?>

<?php
// Close the database connection
$conn->close();
?>

                </div>
            </div>
            <div class="second">
                <div class="box3"><img src="obh.jfif" style="width:150px;height:200px;"></div>
                <div class="box4"><img src="dh.jfif" style="width:145px;height:200px;"></div>
                <div class="box5"><img src="mv.jfif" style="width:150px;height:200px;"></div>
            </div>
            <div class="third">
                <div class="box6"><h3>Add Book</h3>
                <form method="POST" action="add_book.php">
                <table>
                    <tr>
                        <td><label for="title">Book Title:</label></td>
                        <td><input type="text" id="title" name="title" required></td>
                    </tr>
                    <tr>
                        <td><label for="author">Author Name:</label></td>
                        <td><input type="text" id="author" name="author" required></td>
                    </tr>
                    <tr>
                        <td><label for="isbn">ISBN:</label></td>
                        <td><input type="text" id="isbn" name="isbn" required></td>
                    </tr>
                    <tr>
                        <td><label for="quantity">Quantity:</label></td>
                        <td><input type="number" id="quantity" name="quantity" required></td>
                    </tr>
                    <tr>
                        <td><label for="category">Category:</label></td>
                        <td><input type="text" id="category" name="category" required></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center;">
                            <button type="submit" name="addBook">Add Book</button>
                        </td>
                    </tr>
                </table>
            </form>
 

                </div>
            </div>
            <div class="fourth">
                <div class="box7">
                    <form action="process.php" method="post">
                        <table>
                             <tr>
                                <td>Full Name:</td>
                                <td><input type="text" name="name"></td>
                            </tr>
                            <tr>
                                <td>AIUB ID:</td>
                                <td><input type="text" name="id"></td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td><input type="email" name="email"></td>
                            </tr>
                            <tr>
                                <td>Book Title:</td>
                            <td>
                                <select name="title">
                                    <option value="Animal Farm">Animal Farm</option>
                                    <option value="Aborodh Basini">Aborodh Basini</option>
                                    <option value="Marvel Comics">Marvel Comics</option>
                                    <option value="Artificial Inteligence">AI</option>
                                    <option value="A thinking Guide">A thinking guide</option>
                                    <option value="Assembly Language">Assembly Language</option>
                                    <option value="Mad House">Mad House</option>
                                    <option value="Sun to the Moon">Sun to the Moon</option>
                                    <option value="Sweet Poison">Sweet Poison</option>
                                    <option value="Grave of The Fireflies">Grave of the Fireflies</option>
                                </select>
                            </td>
                            </tr>
                            <tr>
                                <td>Borrow Date:</td>
                                <td><input type="date" name="date"></td>
                            </tr>
                            <tr>
                                <td>Token:</td>
                                <td><input type="text" name="token"></td>
                            </tr>
                            <tr>
                                <td>Return Date:</td>
                                <td><input type="date" name="Rdate"></td>
                            </tr>
                            <tr>
                                <td>Fees:</td>
                                <td><input type="text" name="fees"></td>
                            </tr>
                            <tr>
                                <td colspan="2" style="text-align: center;">
                                    <input type="submit" name="submit" value="Submit">
                                </td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="box8">
                    <h3>Token</h3>
                    <ul>
                        <?php
                        $json_data = file_get_contents('token.json');
                        $data = json_decode($json_data, true);
                        foreach($data['token'] as $Token){
                            echo"<li> $Token </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="right"> recent books</div>
        </div>
        
        <div class="space"></div>

    </body>
</html>