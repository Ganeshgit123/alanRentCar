<?php
include_once '../helpers/config.php';
if (!isset($_SESSION)) {
    session_start();
}   
    $bill_id=$_GET["bill_id"];
    // echo "string".$bill_id; 
    $bill_date=$_GET["bill_date"]; 
    $bill_total=$_GET["bill_total"];
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
     
 $sql = "INSERT INTO bill_receipt_details (bill_id,bill_date,bill_total,payment,receipt_date,en_description,ar_description,created_by,created_on)
     VALUES ('$bill_id','$bill_date','$bill_total','$payment','$receipt_date','$en_description','$ar_description','$created_by','$created_on')";
     if (mysqli_query($conn, $sql)) {
        // echo "success";
        $lastid = $conn->insert_id;
         // $lastid = mysqli_insert_id($conn);
         // echo "hg".$lastid;

     } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
     }
     // echo "billId ;".$bill_id;
          if ($bill_total==$payment_lat) {
     $sql2 = "UPDATE bill SET received_amount=".$payment_lat.",i_status='C' WHERE id=".$bill_id;
 }else{
     $sql2 = "UPDATE bill SET received_amount=".$payment_lat." WHERE id=".$bill_id;
 }
     if (mysqli_query($conn, $sql2)) {
        echo $lastid;
       
     } else {
        echo "Error: " . $sql2 . "
" . mysqli_error($conn);
     }
     mysqli_close($conn);
 
 

?>
