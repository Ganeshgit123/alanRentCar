 <div class="table-responsive">
<table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
<thead>

<tr>
<th>S.No</th>
<th>Invoice No</th>
<th>Client Name</th>
<th>Company Name</th>
<th>Po Number</th>
<th>Issue Date</th>
<th>Total</th>
<th>Received Amount</th>
<th>Pending</th>
<th>Status</th>
</tr>
</thead>
<tbody>
<?php 
require_once '../process/dao.php';
$startDate=$_GET['startDate'];
$endDate=$_GET['endDate'];
$tot=0;
$rec=0;
$pen=0;
 
$val= listInvoiceDateReport($startDate,$endDate); 
$count=0;
foreach ($val as $cval) {
$count=$count+1;
$pend=$cval['total']-$cval['received_amount'];
$tot=$tot+$cval['total'];
$rec=$rec+$cval['received_amount'];
$pen=$pen+$pend;

?>
<tr>  
<td><?php echo $count ?></td>
<td><?php echo "YSI".$cval['invoiceId']?></td>
<td><?php echo $cval['clientName']?></td>
<td><?php echo $cval['companyName']?></td>
<td><?php echo $cval['po_number']?></td>
<td><?php echo date('d/m/Y',strtotime($cval['issue_date']))?></td>
<td><?php echo $cval['total']?></td>
<td><?php echo $cval['received_amount']?></td>
<td><?php echo $pend ?></td>
<td><?php  if( $cval['i_status']=='P'){
echo "pending";}else{ echo "completed";
}?></td>
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
	<th><?php echo $tot?></th>
	
	<th><?php echo $rec?></th>
	<th><?php echo $pen?></th>
	<th></th>
</tfoot>
</table>
</div>