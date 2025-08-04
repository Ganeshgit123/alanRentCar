<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
<thead>

<tr>
<th>S.No</th>
<th>Invoice Count</th>
<th>Bill Date</th>
<th>Vat Total</th>

</tr>
</thead>
<tbody>
<?php 
require_once '../process/dao.php';
$startDate=$_GET['startDate'];
$endDate=$_GET['endDate'];
$tot=0;

// echo '$startDate'; 
// echo $endDate; 
$val= listBillVatDateReport($startDate,$endDate); 
// json_encode(listVatDateReport($startDate,$endDate));
$count=0;
foreach ($val as $cval) {
$count=$count+1;
$tot=$tot+$cval['vat'];
?>
<tr>  
<td><?php echo $count; ?></td>
<td><?php echo $cval['IID']; ?></td>
<td><?php echo date('d/m/Y',strtotime($cval['bill_date'])); ?></td>
<td><?php echo $cval['vat']; ?></td>

</tr>
<?php } ?>
</tbody>
<tfoot>
<th>Total</th>
	<th></th>
	<th></th>
	<th><?php echo $tot?></th>

</tfoot>
</table>