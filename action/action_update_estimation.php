<?php
 
include_once '../helpers/config.php';
// echo mysqli_error($conn);
 
if(isset($_POST["qty"]))
{

 $s_no = $_POST["s_no"];
 $client_id = $_POST["client_id"];
 $estimation_date = $_POST["estimation_date"];
 $po_number = 0;
 $expiry_date = $_POST["expiry_date"];
 $credit_days = $_POST["credit_days"];

 $id = $_POST["estimation_id"];
 $product_id = $_POST["product_id"];
 $product_desc = $_POST["product_desc"];
 $ar_product_desc = $_POST["ar_product_desc"];
 $qty = $_POST["qty"];
 $uom = $_POST["uom"];
 $price = $_POST["price"];
 $vat = $_POST["vat"];
 $vatamount = $_POST["vatamount"];
 $line_total = $_POST["line_total"];

 $discount = $_POST["discount"];
 $discountVat=$_POST["discountVat"];
 $dTotal=$_POST["dTotal"];
 $total = $_POST["totalAmt"];
 $vattotal = $_POST["totalVatAmt"];
 $exclude_vat=$_POST["totalPrice"];
 $payment_terms = $_POST["payment_terms"];
 $client_name = $_POST["client_name"];
 $ar_client_name = $_POST["ar_client_name"];
 // $created_by=1;    
     $created_by=$_SESSION["user"];  
  
 $query='';
 $query1='';
 $query2='';
 $updated_on=date('d-m-y H:i:s');
 if($client_id !='' && $estimation_date !='' ){
 $discount = $_POST["discount"];
    $query1 .= 'update estimation set estimation_date="'.$estimation_date.'",po_number="'.$po_number.'",credit_days="'.$credit_days.'",expiry_date="'.$expiry_date.'",payment_terms="'.$payment_terms.'",exclude_vat='.$exclude_vat.',vat_amount='.$vattotal.',vat_amount='.$vattotal.',total='.$total.',discount='.$discount.',discount_vat='.$discountVat.',discount_total='.$dTotal.',client_name="'.$client_name.'",ar_client_name="'.$ar_client_name.'",updated_on="'.$updated_on.'"
where id='.$id;
 // echo $query1;
 }
if(mysqli_query($conn, $query1))
  {
    // echo "string";
    $query2 .= 'DELETE FROM estimation_details WHERE estimation_id='.$id;
    // echo  $query2;
  }

 if(mysqli_multi_query($conn, $query2))
  {
     // $lastid = $conn->insert_id;


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
   INSERT INTO estimation_details(estimation_id,product_id,description,ar_description,qty, uom,price,vat,vat_amount,row_total) 
    VALUES("'.$id.'","'.$product_clean.'", "'.$description_clean.'","'.$ar_description_clean.'","'.$qty_clean.'", "'.$uom_clean.'", "'.$price_clean.'", "'.$vat_clean.'" , "'.$vat_amount_clean.'", "'.$row_total_clean.'"); 
   ';
   // echo $query;
  }
 }
    
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
     echo $id; 
  }
  else{
  // echo $query;
   // echo 'Error';

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