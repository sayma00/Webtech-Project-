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
	<title>View Sections</title>
	<style>
		
		table {
			width: 80%;
			margin: 20px auto;
			border-collapse: collapse;
			background-color: #fff;
		}
		th, td {
			padding: 10px;
			text-align: left;
			border: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
		}
	</style>
</head>
<body>
	<div align="center">
		<?php 
			$x = $_SESSION['sectionInfo'];
			if(empty($x)) {
				echo "<p>No sections found.</p>";
			} else {
				echo "<table>";
				echo "<tr>";
				echo "<th>Name</th>";
				echo "<th>Course Name</th>";
				echo "<th>Student Count</th>";
				echo "<th>Registered Student</th>";
				echo "<th>Class Time</th>";
				echo "</tr>";
				for($i=0; $i<sizeof($x); $i++) {
					echo "<tr>";
					echo "<td>" . $x[$i]['name'] . "</td>";
					echo "<td>" . $x[$i]['coursename'] . "</td>";
					echo "<td>" . $x[$i]['studentCount'] . "</td>";
					echo "<td>" . $x[$i]['registeredStudent'] . "</td>";
					echo "<td>" . $x[$i]['duration'] . "</td>";
					echo "</tr>";
				}
				echo "</table>";
			}
		?>
	</div>
	

</body>
</html>
