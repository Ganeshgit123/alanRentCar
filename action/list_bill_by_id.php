<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php'; 
$query = "select (b.id)id,b.bill_id,p.en_pname, b.product_id,b.description,b.qty,b.uom,b.price,b.vat,b.vat_amount,b.row_total
from bill_details b, products p where b.bill_id=".$_POST["usr_id"]." group by b.product_id,b.description";

// $query = "SELECT  FROM bill_details WHERE bill_id = '".$_POST["usr_id"]."'";  
$result = mysqli_query($conn, $query);  
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>
<th>Bill Id</th>
<th>Product Id</th>
<th>Description</th>
<th>Quantity</th>
<th>UOM</th>
<th>Price</th>
<th>Vat</th>
<th>Vat Amount</th>
<th>Total</th>

</thead>';  
while($row = mysqli_fetch_array($result))  
{  
$output .= '  
<tr>  
     
   <td width="70%">'.$row["bill_id"].'</td>   
   <td width="70%">'.$row["en_pname"].'</td>    
   <td width="70%">'.$row["description"].'</td>  
     <td width="70%">'.$row["qty"].'</td>   
   <td width="70%">'.$row["uom"].'</td>    
   <td width="70%">'.$row["price"].'</td> 
     <td width="70%">'.$row["vat"].'</td>   
   <td width="70%">'.$row["vat_amount"].'</td>    
   <td width="70%">'.$row["row_total"].'</td> 
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