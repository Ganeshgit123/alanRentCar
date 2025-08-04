<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php';   
$query = "select (i.id)iId,i.client_id,i.issue_date,i.po_number,i.credit_days,i.due_date,i.exclude_vat,i.vat_amount,i.total,i.received_amount from invoice i,estimation e where e.id='".$_POST["usr_id"]."' and e.id=i.estimation_no";

// echo $_POST["usr_id"];
// echo $query;
// $query = "SELECT * FROM estimation_details WHERE id = '".$_POST["usr_id"]."'";  
$result = mysqli_query($conn, $query);  
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>
<th>Invoice No</th>
<th>Client Id</th>
<th>Issue Date</th>
<th>PO Number</th>
<th>Credit Days</th>
<th>Due Date</th>
<th>Exclude Vat</th>
<th>Vat Amount</th>
<th>Total</th>


</thead>';  
while($row = mysqli_fetch_array($result))  
{  
$output .= '  
<tr> 
   <td width="20%"><a href="print_sidebar_invoice.php?invoice_id='.$row["iId"].'">
   '.$row["iId"].'</a></td>
   <td width="20%">'.$row["client_id"].'</td>   
   <td width="20%">'.$row["issue_date"].'</td>    
   <td width="30%">'.$row["po_number"].'</td>  
     <td width="10%">'.$row["credit_days"].'</td>   
   <td width="20%">'.$row["due_date"].'</td>
   <td width="70%">'.$row["exclude_vat"].'</td>
   <td width="70%">'.$row["vat_amount"].'</td> 
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