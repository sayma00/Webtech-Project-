<?php 
	session_start();
	include('../Controller/header.php');
    include('../Controller/authentication.php');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>View Profile</title>
	<style>
        .course {
            background-color: #708d81;
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .profile-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #708d81;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
        }

        .profile-title {
            font-size: 32px;
            color: white;
            margin-bottom: 20px;
        }

        .profile-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .profile-table th,
        .profile-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .profile-table th {
            background-color: #708d81;
        }

        .edit-link {
            display: block;
            margin-top: 20px;
            text-decoration: none;
            color: white;
            font-weight: bold;
        }

        .edit-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
	<div class="profile-container">
	    <h1 class="profile-title">Profile</h1>

	    <?php 
	        $x = $_SESSION['info'];
	    ?>

	    <table class="profile-table">
	        <tr><th>Name</th><td><?php echo $x[0]['name']; ?></td></tr>
	        <tr><th>Gender</th><td><?php echo $x[0]['gender']; ?></td></tr>
	        <tr><th>Date of Birth</th><td><?php echo $x[0]['dob']; ?></td></tr>
	        <tr><th>Phone</th><td><?php echo $x[0]['phone']; ?></td></tr>
	        <tr><th>Email</th><td><?php echo $x[0]['email']; ?></td></tr>
	        <tr><th>Address</th><td><?php echo $x[0]['address']; ?></td></tr>
	    </table>

	    <a href="../Controller/editViewProfile.php" class="edit-link">Edit/Update Profile</a>
	</div>
    
</body>


</html>
