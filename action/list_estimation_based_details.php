<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php'; 
  
$query = "select v.en_vname,b.vendor_id,b.id,b.bill_date,b.po_number,b.credit_days,b.due_date,b.exclude_vat,b.vat_amount,b.total,b.received_amount,b.discount,b.discou_vat,b.discount_total,b.payment_terms,b.total from bill b, estimation e, vendor v where b.estimation=e.id and v.id=b.vendor_id and b.estimation=".$_POST["usr_id"]."";

$result = mysqli_query($conn,$query); 
 if (!$result) {
   printf("Error: %s\n", mysqli_error($conn));
   exit();
}
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>
<th>Bill ID</th>
<th>Issue Date</th>
<th>PO Number</th>
<th>Due Date</th>
<th>Credit Days</th>
<th>Total</th>
<th>Vat Amount</th>
<th>Exclude Vat</th>
<th>Received Amount</th>
<th>Total</th>
</thead>';  
while($row = mysqli_fetch_array($result))  
{  
	$count = 0;
$output .= '  
<tr>  
 
   <td width="20%"><a href="print_sidebar_bill.php?bill_id='.$row["id"].'">'.$row["id"].'</a></td>
   <td width="30%">'.$row["en_vname"].'</td>    
   <td width="70%">'.date('d/m/Y',strtotime($row["bill_date"])).'</td>  
   <td width="70%">'.$row["po_number"].'</td>   
   <td width="70%">'.$row["credit_days"].'</td>    
   <td width="70%">'.date('d/m/Y',strtotime($row["due_date"])).'</td> 
   <td width="70%">'.$row["vat_amount"].'</td>   
   <td width="70%">'.$row["exclude_vat"].'</td>    
   <td width="70%">'.$row["received_amount"].'</td> 
    <td width="70%">'.$row["total"].'</td> 
 
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
 