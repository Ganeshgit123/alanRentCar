<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php'; 
  
$query = "select i.id,i.client_id,i.issue_date,i.po_number,i.credit_days,i.due_date,i.total,i.received_amount,i.i_status,i.vat_amount,i.exclude_vat
from products p, invoice_details id, invoice i , clients c 
where id.product_id=p.id and id.invoice_id=i.id and i.i_status='P' and i.client_id=".$_POST["usr_id"]." group by i.id";

$result = mysqli_query($conn,$query); 
 if (!$result) {
   printf("Error: %s\n", mysqli_error($conn));
   exit();
}
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>
 <th>ID</th>
<th>Issue Date</th>
<th>PO Number</th>
<th>Due Date</th>
<th>Credit Days</th>
<th>Total</th>
<th>Vat Amount</th>
<th>Exclude Vat</th>
<th>Received Amount</th>
</thead>';  
while($row = mysqli_fetch_array($result))  
{  
	$count = 0;
$output .= '  
<tr>  
 
   <td width="20%">'.$row["id"].'</td>   
   <td width="30%">'.date('d/m/Y',strtotime($row["issue_date"])).'</td>    
   <td width="70%">'.$row["po_number"].'</td>  
   <td width="70%">'.date('d/m/Y',strtotime($row["due_date"])).'</td>   
   <td width="70%">'.$row["credit_days"].'</td>    
   <td width="70%">'.$row["total"].'</td> 
   <td width="70%">'.$row["vat_amount"].'</td>   
   <td width="70%">'.$row["exclude_vat"].'</td>    
   <td width="70%">'.$row["received_amount"].'</td> 
 
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
 