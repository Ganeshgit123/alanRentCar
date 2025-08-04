<?php
         include '../helpers/config.php';
	
            
  
    if( isset($_GET['del']) )
    {
        $id = $_GET['del'];
        $sql= "DELETE FROM changes_on_contract WHERE id=".$id;
        mysqli_query($conn,$sql);

    }
        // echo 0;
?>

<script type="text/javascript">
location.href = '../contract_changed_list.php';
</script>