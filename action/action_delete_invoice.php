<?php
         include '../helpers/config.php';
	
            
  
    if( isset($_GET['del']) )
    {
        $id = $_GET['del'];
        $sql= "DELETE FROM invoice WHERE id=".$id;
        mysqli_query($conn,$sql);

        $sql1= "DELETE FROM invoice_details WHERE invoice_id=".$id;
        mysqli_query($conn,$sql1);

        $sql2= "DELETE FROM invoice_receipt_details WHERE invoice_id=".$id;
        mysqli_query($conn,$sql2);
    }
        // echo 0;
?>

<script type="text/javascript">
location.href = '../list_invoice.php';
</script>