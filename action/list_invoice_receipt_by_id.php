<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php'; 
  
$query = "SELECT (ird.id)rId,ird.invoice_id, ird.invoice_date, ird.invoice_total,ird.payment,ird.receipt_date,ird.en_description,ird.ar_description,ird.created_by,u.en_firstname,u.en_lastname,u.ar_firstname,u.ar_lastname FROM invoice_receipt_details ird, invoice i,users u where u.id=ird.created_by and ird.invoice_id=i.id and i.id=".$_POST['usr_id']."";
// print_r($query);

// $query = "SELECT  FROM bill_details WHERE bill_id = '".$_POST["usr_id"]."'";  
$result = mysqli_query($conn,$query); 
// echo mysqli_error(); 
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>

<th>Receipt Id</th>
<th>Invoice Date</th>
<th>Invoice Total</th>
<th>Payment</th>
<th>Receipt Date</th>
<th>Description(En)</th>
<th>Description(AR)</th>
<th>Created By</th>

</thead>';  
while($row = mysqli_fetch_array($result))  
{  
$output .= '  
<tr>  
     
   <td width="50%"><a href="invoice_receipt_print.php?id='.$row["rId"].' target="blank_">'.$row["rId"].'</a></td>
   <td width="50%">'.date('d/m/Y',strtotime($row["invoice_date"])).'</td>    
   <td width="70%">'.$row["invoice_total"].'</td>  
   <td width="50%">'.$row["payment"].'</td>   
   <td width="50%">'.date('d/m/Y',strtotime($row["receipt_date"])).'</td>    
   <td width="50%">'.$row["en_description"].'</td> 
   <td width="50%">'.$row["ar_description"].'</td>   
  
   <td width="70%">'.$row["en_firstname"]." ".$row["en_lastname"]."/".$row["ar_firstname"]." ".$row["ar_lastname"].'</td>  
</tr> 
';  
}  
$output .= '  
</table>  
</div>  
';  
echo $output;  
}  
?>