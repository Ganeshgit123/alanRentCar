<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php'; 
$query = "SELECT (brd.id)rId,brd.bill_id, brd.bill_date, brd.bill_total, brd.payment, brd.receipt_date, brd.en_description, brd.ar_description, brd.created_by, u.en_firstname,u.en_lastname,u.ar_firstname,u.ar_lastname FROM bill_receipt_details brd, bill b, users u where u.id=brd.created_by and b.id=brd.bill_id and b.id=".$_POST["usr_id"]."";

$result = mysqli_query($conn, $query);  
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>
<th>Bill Id</th>
<th>Bill Date</th>
<th>Total</th>
<th>Payment</th>
<th>Receipt Date</th>
<th>Description(EN)</th>
<th>Description(AR)</th>
<th>Created By</th>

</thead>';  
while($row = mysqli_fetch_array($result))  
{  
$output .= '  
<tr>  
     
   <td width="70%"><a href="receipt.php?id='.$row["rId"].' target="_blank">'.$row["rId"].'</a></td>   
   <td width="70%">'.date('d/m/Y',strtotime($row["bill_date"])).'</td>    
   <td width="70%">'.$row["bill_total"].'</td>  
     <td width="70%">'.$row["payment"].'</td>   
   <td width="70%">'.date('d/m/Y',strtotime($row["receipt_date"])).'</td>    
   <td width="70%">'.$row["en_description"].'</td> 
     <td width="70%">'.$row["ar_description"].'</td>   
   <td width="70%">'.$row["en_firstname"]." ".$row["en_firstname"]."/".$row["ar_firstname"]." ".$row["ar_lastname"].'</td>     
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