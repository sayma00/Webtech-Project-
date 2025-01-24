<?php 
  include("../model/Connect.php");
  $conn = connect();
  
   $name = $_POST['name'];
  
   $sql = "SELECT * FROM facultys WHERE name LIKE '%$name%' OR department LIKE '%$name%' OR faculty LIKE '%$name%' OR email LIKE '%$name%' OR specialization LIKE '%$name%' OR roomNo LIKE '%$name%'";  
   $query = mysqli_query($conn,$sql);
   $data='';
   while($row = mysqli_fetch_assoc($query))
   {
       $data .=  "<tr>
                    <td>".$row['name']."</td>
                    <td>".$row['faculty']."</td>
                    <td>".$row['department']."</td>
                    <td>".$row['specialization']."</td>
                    <td>".$row['email']."</td>
                    <td>".$row['roomNo']."</td>
                  </tr>";
   }
    echo $data;
 ?>