<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php'; 
$query = "SELECT (b.id)bId,v.en_company_name,b.vendor_id, b.bill_date, b.po_number,  b.due_date, b.total, b.received_amount,(b.total-b.received_amount)pending, b.i_status
FROM bill b,vendor v where v.id=b.vendor_id and b.i_status='p' and b.vendor_id=".$_POST['usr_id']."";

// $query = "SELECT  FROM bill_details WHERE bill_id = '".$_POST["usr_id"]."'";  
$result = mysqli_query($conn, $query);
// if (!$result) {
//    printf("Error: %s\n", mysqli_error($conn));
//    exit();
// }  
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>
<th>Vendor name</th>
<th>Bill No</th>
<th>Total</th>
<th>Paid</th>
<th>Pending</th>



</thead>';  
while($row = mysqli_fetch_array($result))  
{  
$output .= '  
<tr>  
     
   <td width="70%">'.$row["en_company_name"].'</td> 
      <td width="30%">'.'YSVB'.$row["bId"].'</td>  
   <td width="70%">'.$row["total"].'</td>    
   
     <td width="70%">'.$row["received_amount"].'</td>   
   <td width="70%">'.$row["pending"].'</td> 
   
  
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
