<?php
session_start();
error_reporting(0);
include_once '../helpers/config.php';
   
    $invoice_id=$_GET["invoice_id"]; 
    $invoice_date=$_GET["invoice_date"]; 
    $invoice_total=$_GET["invoice_total"];
    $payment=$_GET["payment"];
    $received_amount=$_GET["received_amount"]; 
    $receipt_date=$_GET["receipt_date"];
    $en_description=$_GET["en_description"];
    $ar_description=$_GET["ar_description"]; 
    $payment_lat = $payment+$received_amount; 
    date_default_timezone_set("Asia/Kolkata");
    $created_on= date("d/m/yy H:i:s"); 
    // $created_by=1;    
     $created_by=$_SESSION["user"];  
    // require_once '../process/dao.php';
     
 $sql = "INSERT INTO invoice_receipt_details (invoice_id,invoice_date,invoice_total,payment,receipt_date,en_description,ar_description,created_by,created_on)
     VALUES ('$invoice_id','$invoice_date','$invoice_total','$payment','$receipt_date','$en_description','$ar_description','$created_by','$created_on')";
     if (mysqli_query($conn, $sql)) {
    $lastid = $conn->insert_id;
    
     } else { 
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     // echo $received_amount;
     if ($invoice_total==$payment_lat) {
         # code...
        $sql2 = "UPDATE invoice SET received_amount=".$payment_lat.",i_status='C' WHERE id=".$invoice_id;
     }else{
     $sql2 = "UPDATE invoice SET received_amount=".$payment_lat." WHERE id=".$invoice_id;
 }
     // echo $sql2;
     if (mysqli_query($conn, $sql2)) {
          echo $lastid;
     } else {
        echo "Error: " . $sql2 . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
 
 

?>
