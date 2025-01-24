<?php
  session_start();
  include('../Controller/header.php');
  include('../Controller/authentication.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Faculty View</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <style>.search-bar {
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
        }</style>
</head>

<body>


<?php
include('../model/Connect.php');
$conn = connect();
?>

<div class="container mt-4">
    
    <h6 class="mt-5"><b>Search</b></h6>
    
    <div class="search-bar">
        <input type="text" id="search" placeholder="Search facultys..." onkeyup="filterFacultys()" />
        <button onclick="$('#search').trigger('keyup')">Search</button>
    </div>


    <table class="table table-striped">
        <thead>
          <tr>
            <th>Name</th>
            <th>Faculty</th>
            <th>Department</th>
            <th>Specialization</th>
            <th>Email</th>
            <th>Room No</th>
          </tr>
        </thead>
        <tbody id="showdata">
          <?php  
                $sql = "SELECT * FROM facultys";
                $query = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($query))
                {
                  echo"<tr>";
                   echo"<td><h6>".$row['name']."</h6></td>";
                   echo"<td><h6>".$row['faculty']."</h6></td>";
                   echo"<td>".$row['department']."</td>";
                   echo"<td>".$row['specialization']."</td>";
                   echo"<td>".$row['email']."</td>";
                   echo"<td>".$row['roomNo']."</td>";
                  echo"</tr>";   
                }
            ?>
        </tbody>
    </table>
</div>


<script>
 /* $(document).ready(function(){
   $('#search').on("keyup", function(){
     var searchQuery = $(this).val();
     $.ajax({
       method:'POST',
       url:'../Controller/facultySearch.php',
       data:{name:searchQuery},
       success:function(response)
       {
            $("#showdata").html(response);
       } 
     });
   });
  });
</script>



</body>
</html>