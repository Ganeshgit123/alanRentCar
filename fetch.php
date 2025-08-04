<?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "alanzirentacar");  
 if(isset($_POST["employee_id"]))  
 {  
      $query = "SELECT * FROM estimation WHERE id = '".$_POST["employee_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>