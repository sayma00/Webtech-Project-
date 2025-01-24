<?php
  session_start();
  include('../Controller/header.php');
  include('../Controller/authentication.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Aid</title>
    <style>
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px;
        }
        .search-bar {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            width: 50%;
        }
        .search-bar input {
            flex: 1;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .search-bar button {
            padding: 8px 12px;
            background-color: #5cdb95;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .search-bar button:hover {
            background-color: #8ee4af;
        }
        .course-list {
            width: 50%;
            max-height: 400px; 
            overflow-y: auto; 
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 10px;
            background-color: #f7f7f7;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            scrollbar-width: thin; 
            scrollbar-color: #8ee4af #f7f7f7; 
        }

        .course-list::-webkit-scrollbar {
            width: 8px; 
        }

        .course-list::-webkit-scrollbar-track {
            background: #f7f7f7; 
            border-radius: 8px;
        }

        .course-list::-webkit-scrollbar-thumb {
            background-color: #8ee4af; 
            border-radius: 8px;
            border: 2px solid #f7f7f7; 
        }
    </style>
</head>
<body>

<div class="container">
    <div class="search-bar">
        <input type="text" id="search" placeholder="Search courses..." onkeyup="filterCourses()" />
        <button onclick="filterCourses()">Search</button>
    </div>

    <div class="course-list" id="courseList">
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background-color: #5cdb95; color: white;">
                    <th style="padding: 10px; border: 1px solid #ccc;">ID</th>
                    <th style="padding: 10px; border: 1px solid #ccc;">Courses</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection
                $conn = new mysqli('localhost', 'root', '', 'studentportal');
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                // Fetch courses
                $sql = "SELECT * FROM courses";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $rowColor = false; 
                    while ($row = $result->fetch_assoc()) {
                        $bgColor = $rowColor ? '#f7f7f7' : '#ffffff';
                        echo "<tr style='background-color: $bgColor;'>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . htmlspecialchars($row['id']) . "</td>";
                        echo "<td style='padding: 10px; border: 1px solid #ccc;'>" . htmlspecialchars($row['name']) . "</td>";
                        echo "</tr>";
                        $rowColor = !$rowColor; 
                    }
                } else {
                    echo "<tr><td colspan='2' style='text-align: center; padding: 10px;'>No courses available.</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

</div>



<script>
    function filterCourses() {
        const search = document.getElementById('search').value.toLowerCase();
        const rows = document.querySelectorAll('#courseList tbody tr'); // Select all rows inside the table body
        rows.forEach(row => {
            const courseName = row.querySelector('td:nth-child(2)').textContent.toLowerCase(); // Get the course name
            if (courseName.includes(search)) {
                row.style.display = ''; // Show row if it matches the search
            } else {
                row.style.display = 'none'; // Hide row if it doesn't match
            }
        });
    }
</script>

</body>
</html>
