<?php  
if(isset($_POST["usr_id"]))  
{  
$output = '';  
include_once '../helpers/config.php'; 
  
$query = "select (invd.id)id,invd.invoice_id,p.en_pname, invd.product_id,invd.description,invd.qty,invd.uom,invd.price,invd.vat,invd.vat_amount,invd.row_total from invoice_details invd, products p where invd.invoice_id=".$_POST['usr_id']." group by invd.product_id,invd.description";
// print_r($query);

// $query = "SELECT  FROM bill_details WHERE bill_id = '".$_POST["usr_id"]."'";  
$result = mysqli_query($conn,$query); 
// echo mysqli_error(); 
$output .= '  
<div class="table-responsive">  
<table class="table table-bordered">
<thead>

<th>Product Id</th>
<th>Description</th>
<th>Quantity</th>
<th>UOM</th>
<th>Price</th>
<th>Vat</th>
<th>Vat&nbsp;&nbsp;Amount</th>
<th>Total</th>

</thead>';  
while($row = mysqli_fetch_array($result))  
{  
$output .= '  
<tr>  
     
  
   <td width="50%">'.$row["en_pname"].'</td>    
   <td width="70%">'.$row["description"].'</td>  
     <td width="50%">'.$row["qty"].'</td>   
   <td width="50%">'.$row["uom"].'</td>    
   <td width="50%">'.$row["price"].'</td> 
     <td width="50%">'.$row["vat"].'</td>   
   <td width="70%">'.$row["vat_amount"].'</td>    
   <td width="50%">'.$row["row_total"].'</td> 
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