<?php
         include '../helpers/config.php';
	
            
  
    if( isset($_GET['del']) )
    {
        $id = $_GET['del'];
        $sql= "DELETE FROM estimation WHERE id=".$id;
        mysqli_query($conn,$sql);

        $sql1= "DELETE FROM estimation_details WHERE estimation_id=".$id;
        mysqli_query($conn,$sql1);
        // echo 1;
    }
        // echo 0;
            ?>

<script type="text/javascript">
location.href = '../list_estimation.php';
</script>