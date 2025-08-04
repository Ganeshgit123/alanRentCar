<?php

include '../helpers/config.php';

if(isset($_POST["qty"]))
{
// print_r($_POST["qty"]);
 $s_no = $_POST["s_no"];
 $client_id = $_POST["client_id"];
 $issue_date = $_POST["issue_date"];
 $po_number = $_POST["ponumber"];
 $due_date = $_POST["due_date"];
 $credit_days = $_POST["credit_days"];
 $product_id = $_POST["product_id"];
 $product_desc = $_POST["product_desc"];
 $ar_product_desc = $_POST["ar_product_desc"];
 $qty = $_POST["qty"];
 $uom = $_POST["uom"];
 $price = $_POST["price"];
 $vat = $_POST["vat"];
 $vat_amount= $_POST["vatamount"];
 $line_total= $_POST["line_total"];
 // $discount_total= $_POST["dTotal"]; 
 $vattotal=$_POST["totalVatAmt"];
 $total=$_POST["totalAmt"];
 $exclude_vat=$total-$vattotal;
 $client_name = $_POST["client_name"];
 $ar_client_name = $_POST["ar_client_name"];
 // $created_by=1;    
     $created_by=$_SESSION["user"];  
 $id=$_POST["id"];;
 $query='';
 $query1='';
 $query2='';
 $updated_on=date('d-m-y H:i:s');
 if($client_id !='' && $issue_date !='' ){
    $query1 .= 'update invoice set issue_date="'.$issue_date.'",po_number="'.$po_number.'",credit_days="'.$credit_days.'",
due_date="'.$due_date.'",exclude_vat='.$exclude_vat.',vat_amount='.$vattotal.',total='.$total.',client_name="'.$client_name.'",ar_client_name="'.$ar_client_name.'",updated_on="'.$updated_on.'"
where id='.$id;
// echo $query1;
 }

if(mysqli_query($conn, $query1))
  {

    $query2 .= 'DELETE FROM invoice_details WHERE invoice_id='.$id;
    // echo $query2;
  }


 if(mysqli_multi_query($conn, $query2))
  {
     // $lastid = $conn->insert_id;

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
  $vat_amount_clean = mysqli_real_escape_string($conn, $vat_amount[$count]);
  $row_total_clean = mysqli_real_escape_string($conn, $line_total[$count]);
  // if($description_clean != '' && $qty_clean != '' && $uom_clean != '' && $price_clean != ''&& $vat_clean != ''&& $vat_amount_clean != '')
  // {
   $query .= 'INSERT INTO invoice_details(invoice_id,product_id,description,ar_description,qty, uom,price,vat,vat_amount,row_total) 
    VALUES("'.$id.'","'.$product_clean.'", "'.$description_clean.'", "'.$ar_description_clean.'", "'.$qty_clean.'", "'.$uom_clean.'", "'.$price_clean.'", "'.$vat_clean.'" , "'.$vat_amount_clean.'", "'.$row_total_clean.'");'; 
  
   // echo $query;
  // }
 }
    
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
   echo $id; 
     // echo 'success';
  }
  else{
   // echo 'Error'.$query;
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