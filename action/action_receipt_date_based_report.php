<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
<thead>

<tr>
<th>S.No</th>
<th>Invoice Id</th>
<th>Receipt Date</th>
<th>Receipt Description</th>
<th>Receipt Total</th>

</tr>
</thead>
<tbody>
<?php 
require_once '../process/dao.php';
$startDate=$_GET['startDate'];
$endDate=$_GET['endDate'];
// $tot=0;

// echo '$startDate'; 
// echo $endDate; 
$val= listInvoiceReceiptDateReport($startDate,$endDate); 
// json_encode(listVatDateReport($startDate,$endDate));
$count=0;
$receipttot=0;
foreach ($val as $cval) {
$count=$count+1;
?>
<tr>  
<td><?php echo $count; ?></td>
<td><a href="invoice_receipt_print.php?id=<?php echo $cval['id']; ?>"><?php echo $cval['invoice_id']; ?></a></td>
<td><?php echo date('d/m/Y',strtotime($cval['receipt_date'])); ?></td>
<td><?php echo $cval['en_description']. "/" .$cval['ar_description']; ?></td>
<td><?php echo $cval['invoice_total'];$receipttot=$receipttot+$cval['invoice_total']; ?></td>

</tr>
<?php } ?>
</tbody>
<tfoot>
<th></th>
<th></th>
<th></th>
<th>Total</th>
<th><?php echo $receipttot?></th>
</tfoot>
</table>