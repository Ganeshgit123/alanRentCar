 <div class="table-responsive">
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
<thead>

<tr>
<th>S.No</th>
<th>Invoice No</th>
<th>Client Name</th>
<th>Company Name</th>
<th>Po Number</th>
<th>Estimation Date</th>
<th>Expiry Date</th>
<th>Payment Terms</th>
<th>Total</th>
<th>Discount</th>
 </tr>
</thead>
<tbody>
<?php 
require_once '../process/dao.php';
$startDate=$_GET['startDate'];
$endDate=$_GET['endDate'];
// echo $startDate; echo $endDate;
$tot=0;
$dis=0;
$val= listEstimationDateReport($startDate,$endDate); 
$count=0;
foreach ($val as $cval) {
$count=$count+1;
$tot=$tot+$cval['total'];
$dis=$dis+$cval['discount'];
?>
<tr>  
<td><?php echo $count ?></td>
<td><?php echo "YSI".$cval['estimationId']?></td>
<td><?php echo $cval['clientName']?></td>
<td><?php echo $cval['companyName']?></td>
<td><?php echo $cval['po_number']?></td>
<td><?php echo date('d/m/Y',strtotime($cval['estimation_date']))?></td>
<td><?php echo date('d/m/Y',strtotime($cval['expiry_date']))?></td>
<td><?php echo $cval['payment_terms']?></td>
<td><?php echo $cval['total']?></td>
<td><?php echo $cval['discount']?></td>
</tr>
<?php } ?>
</tbody>
<tfoot>
	<th>Total</th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th></th>
	<th><?php echo $tot?></th>
	<th><?php echo $dis?></th>
</tfoot>
</table>
</div>