<?php
         include '../helpers/config.php';
	
            
  
    if( isset($_GET['del']) )
    {
        $id = $_GET['del'];
        $sql= "DELETE FROM bill WHERE id=".$id;
        mysqli_query($conn,$sql);
        
        $sql1= "DELETE FROM bill_details WHERE bill_id=".$id;
        mysqli_query($conn,$sql1);

        $sql2= "DELETE FROM bill_receipt_details WHERE bill_id=".$id;
        mysqli_query($conn,$sql2);
    }
        // echo 0;
?>

<script type="text/javascript">
location.href = '../list_bill.php';
</script>