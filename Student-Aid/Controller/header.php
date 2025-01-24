<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student-Aid</title>
    <link rel="stylesheet" href="../view/CSS/header.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            color:#black
            background-color: #green;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

<header>
<a href="landing.php" class="logo-link"><h1>Student Aid</h1></a>
    <button class="logout-btn" onclick="alert('Logging out...')">
        <img src="https://img.icons8.com/ios-filled/50/logout-rounded.png" alt="Logout">
    </button>
</header>
    
<nav> 
        <a href="../Controller/viewProfileAction.php">View Profile</a>
        <a href="../Controller/editViewProfile.php">Update Profile</a>
        <a href="../view/changePassword.php">Change Password</a>
        <a href="../view/facultyView.php">Facultys</a>
        <a href="../view/courses.php">Courses</a>
        <a href="../view/addCourses.php">Add Course</a>
        <a href="../Controller/sectionViewAction.php">Available Sections</a>
        <a href="../Controller/logout.php">Logout</a>
</nav>

</body>
</html>
