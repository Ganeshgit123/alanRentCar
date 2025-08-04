<?php
session_start();
include '../helpers/config.php';

if(isset($_POST["qty"]))
{

 $s_no = $_POST["s_no"];
 $client_id = $_POST["client_id"];
 $issue_date = $_POST["issue_date"];
 $ponumber = $_POST["ponumber"];
 $due_date = $_POST["due_date"];
 $credit_days = $_POST["credit_days"];
 $product_id = $_POST["product_id"];
 $product_desc = $_POST["product_desc"];
 $ar_product_desc = $_POST["ar_product_desc"];
 $qty = $_POST["qty"];
 $uom = $_POST["uom"];
 $price = $_POST["price"];
 $vat = $_POST["vat"];
 $vatamount= $_POST["vatamount"];
 $line_total= $_POST["line_total"];
 $client_name = $_POST["client_name"];
 $ar_client_name = $_POST["ar_client_name"];
  $notes= $_POST["notes"];

 if ($_POST["estimation_id"]!='') {
   $estimation_id= $_POST["estimation_id"]; 
 }else{
   $estimation_id=0;
 }

 $vattotal=$_POST["totalVatAmt"];
 $total=$_POST["totalAmt"];
 $exclude_vat=$total-$vattotal;
 // $created_by=1;    
     $created_by=$_SESSION["user"];  

 $query='';
 $query1='';
 $created=date('d-m-y H:i:s');
 if($client_id !='' && $issue_date !='' ){
    $query1 .= 'INSERT INTO `invoice` (`client_id`,`estimation_no`,`issue_date`,`po_number`,`credit_days`, `due_date`,`exclude_vat`,`vat_amount`, `total`,`notes`, `created_by`, `created_on`, `client_name`, `ar_client_name`) VALUES("'.$client_id.'","'.$estimation_id.'","'.$issue_date.'","'.$ponumber.'", "'.$credit_days.'", "'.$due_date.'", "'.$exclude_vat.'", "'.$vattotal.'", "'.$total.'","'.$notes.'", "'.$created_by.'", "'.$created.'", "'.$client_name.'", "'.$ar_client_name.'");';
 }
 if(mysqli_multi_query($conn, $query1))
  {
     $lastid = $conn->insert_id;

 // echo "lastid  : ".$lastid;

     for($count = 0; $count<count($qty); $count++)
 {
    $product_clean = mysqli_real_escape_string($conn, $product_id[$count]);
 
  $description_clean = mysqli_real_escape_string($conn, $product_desc[$count]);
  $ar_description_clean = mysqli_real_escape_string($conn, $ar_product_desc[$count]);
  $qty_clean = mysqli_real_escape_string($conn, $qty[$count]);
  $uom_clean = mysqli_real_escape_string($conn, $uom[$count]);
  $price_clean = mysqli_real_escape_string($conn, $price[$count]);
  $vat_clean = mysqli_real_escape_string($conn, $vat[$count]);
  $vat_amount_clean = mysqli_real_escape_string($conn, $vatamount[$count]);
  $row_total_clean = mysqli_real_escape_string($conn, $line_total[$count]);
  if($description_clean != '' && $qty_clean != '' && $uom_clean != '' && $price_clean != ''&& $vat_clean != ''&& $vat_amount_clean != '')
  {
   $query .= '
   INSERT INTO invoice_details(invoice_id,product_id,description,ar_description,qty, uom,price,vat,vat_amount,row_total) 
    VALUES("'.$lastid.'","'.$product_clean.'", "'.$description_clean.'", "'.$ar_description_clean.'", "'.$qty_clean.'", "'.$uom_clean.'", "'.$price_clean.'", "'.$vat_clean.'" , "'.$vat_amount_clean.'", "'.$row_total_clean.'"); 
   ';
    //echo $ar_description_clean ;
  }
 }
    
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
   echo $lastid."";
  }
  else{
   echo 'Error';
  }
 }
 else{
  echo 'All Fields are Required';
 }
  }else {
    // echo "query1".$query1;    
    // echo "query".$query;
  echo 'All Fields are Required1';
 }
}
?>