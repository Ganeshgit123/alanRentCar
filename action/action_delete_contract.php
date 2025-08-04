<?php
         include '../helpers/config.php';
	
            
  
    if( isset($_GET['del']) )
    {
        $id = $_GET['del'];
        $sql= "DELETE FROM contract WHERE id=".$id;
        mysqli_query($conn,$sql);

        $sql1= "DELETE FROM contract_details WHERE contract_id=".$id;
        mysqli_query($conn,$sql1);

    }
        // echo 0;
?>

<script type="text/javascript">
location.href = '../contract_list.php';
</script>