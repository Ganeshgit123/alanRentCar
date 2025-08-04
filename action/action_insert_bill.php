<?php
 session_start();
include_once '../helpers/config.php';
// echo mysqli_error($conn);
 
if(isset($_POST["qty"]))
{

 $s_no = $_POST["s_no"];
 $vendor_id = $_POST["vendor_id"];
 $bill_date = $_POST["issue_date"];
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
 $vatamount = $_POST["vatamount"];
 $line_total = $_POST["line_total"];
 // $discount = $_POST["discount"];
 $total = $_POST["totalAmt"];
 $vattotal = $_POST["totalVatAmt"];
 $exclude_vat=$total-$vattotal;
 $payment_terms = $_POST["payment_terms"];
 $estimation = $_POST["estimation"];
 // $created_by=1;    
     $created_by=$_SESSION["user"];  
 // echo $credit_days ;
 $query='';
 $query1='';
 $created=date('d-m-yy H:i:s');
 if($vendor_id !='' && $bill_date !='' ){
    $query1 .= '
 INSERT INTO `bill` (`vendor_id`,`bill_date`,`po_number`,`credit_days`, `due_date`,`exclude_vat`,`vat_amount`, `total`, `payment_terms`, `estimation`, `created_by`, `created_on`) VALUES("'.$vendor_id.'","'.$bill_date.'","'.$ponumber.'", "'.$credit_days.'", "'.$due_date.'", "'.$exclude_vat.'", "'.$vattotal.'", "'.array_sum($line_total).'", "'.$payment_terms.'", "'.$estimation.'", "'.$created_by.'", "'.$created.'");';
 
 }
 if(mysqli_multi_query($conn, $query1))
  {
     $lastid = $conn->insert_id;


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
  if($description_clean != '' && $ar_description_clean != '' && $qty_clean != '' && $uom_clean != '' && $price_clean != ''&& $vat_clean != ''&& $vat_amount_clean != '')
  {
   $query .= '
   INSERT INTO bill_details(bill_id,product_id,description,ar_description,qty, uom,price,vat,vat_amount,row_total) 
    VALUES("'.$lastid.'","'.$product_clean.'", "'.$description_clean.'", "'.$ar_description_clean.'", "'.$qty_clean.'", "'.$uom_clean.'", "'.$price_clean.'", "'.$vat_clean.'" , "'.$vat_amount_clean.'", "'.$row_total_clean.'"); 
   ';
   // echo $query;
  }
 }
    
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
    echo $lastid;
  }
  else{
  // echo $query;
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