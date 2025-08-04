<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<link rel="icon" href="assets/images/favicon.ico">

<title>Alanzirentacar</title>

<!-- Main Styles -->
<link rel="stylesheet" href="assets/styles/style.min.css">

<!-- Material Design Icon -->
<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

<link rel="stylesheet" href="assets/plugin/modal/remodal/remodal.css">
    <link rel="stylesheet" href="assets/plugin/modal/remodal/remodal-default-theme.css">
<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

<!-- Sweet Alert -->
<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

<!-- Table Responsive -->
<link rel="stylesheet" href="assets/plugin/RWD-table-pattern/css/rwd-table.min.css">

</head>

<body>

<?php include 'side_header.php'; ?>

<?php include 'top_header.php'; ?>
  
<div id="wrapper">
<div class="main-content">

<div class="row small-spacing">
<div class="col-xs-12">
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4> Vendor Bill List</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        <a href='bill.php'><button class="btn btn-warning">Add New</button></a>
    </div>
</div>

<div class="card-content">
  
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>Bill Id</th>
<th width="150">Vendor Name(EN)</th>
<th width="150" class="arab">اسم البائع</th>
<th>Bill Date</th>
<th>PO Number</th>
<th>Total</th>
<th>Paid Amount</th>
<th>Pending</th>
<th>Status</th>
<?php
if($_SESSION["user_level"]==1){
echo '<th>Created By</th>';
}
?>
<th>Action</th>
</tr>
      
        </thead>
       <tbody>

<?php
 
include('helpers/config.php');
 if ($_SESSION["user_level"]==2) {
$query = "select (b.id)billId,b.vendor_id, b.bill_date,b.po_number,b.credit_days,b.due_date,b.exclude_vat,
b.vat_amount,b.total,b.i_status,v.en_vname,v.ar_vname,b.received_amount,(u.en_firstname)Uen_firstname,u.en_lastname
from bill b,users u, vendor v where v.id=b.vendor_id and u.id=b.created_by and b.created_by=".$_SESSION["user"]." order by b.id DESC";
}else{
    $query = "select (b.id)billId,b.vendor_id, b.bill_date,b.po_number,b.credit_days,b.due_date,b.exclude_vat,
b.vat_amount,b.total,b.i_status,v.en_vname,v.ar_vname,b.received_amount,(u.en_firstname)Uen_firstname,u.en_lastname
from bill b,users u, vendor v where v.id=b.vendor_id and u.id=b.created_by order by b.id DESC";
}

$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 
while ($row = mysqli_fetch_array($result)) {
$obj = array("billId" => $row['billId'],
"vendor_id" => $row['vendor_id'],
"en_vname" => $row['en_vname'],  
"ar_vname" => $row['ar_vname'], 
"bill_date" => $row['bill_date'],
"po_number" => $row['po_number'],
"total" => $row['total'],
"status" =>$row['i_status'],
"received_amount" => $row['received_amount'],
"Uen_firstname" => $row['Uen_firstname'],
"en_lastname" => $row['en_lastname']);

include('helpers/config.php');
$query2 = "SELECT bill_id FROM bill_receipt_details b where bill_id=".$obj['billId'].";";
$result2 = mysqli_query($conn,$query2) ;
 $row = mysqli_fetch_assoc($result2);
 $IId=$row['bill_id'];
?>

<tr>
<td><?php echo $obj['billId']; ?></td>
<td><?php echo $obj['en_vname'];?></td>
<td><span class="arabic"><?php echo $obj['ar_vname'];?></span></td>
<td><?php echo date('d/m/Y',strtotime($obj['bill_date']));?></td>
<td><?php echo $obj['po_number'];?></td>
<td><?php echo $obj['total'];?></td>
<td><?php echo $obj['received_amount'];?></td>
<td><?php echo $obj['total']-$obj['received_amount'];?></td>
 <td><?php if($obj['status']=='P'){
  echo 'Pending';
}else{
  echo 'Completed';
}?></td>

<?php if($_SESSION["user_level"]==1){ echo "<td>".$obj['Uen_firstname']." ".$obj['en_lastname']."</td>"; } ?>
<td>

<input type="button" name="view" value="Details" id="<?php echo $obj["billId"]; ?>" class="btn btn-info btn-xs view_data" />

<?php if($obj['status']=='P') { ?>
<a href="bill_receipt_form.php?bill_id=<?php echo $obj['billId'];?>" class="btn btn-xs btn-success">Receipt</a>

 <?php   }?>

<a href="print_sidebar_bill.php?bill_id=<?php echo $obj['billId'];?>" target="_blank" class="btn btn-xs btn-warning" onclick="myFunction()">Reprint</a>


<?php if ($IId=='') { ?> 
    <a href="update_bill.php?bill_id=<?php echo $obj['billId'];?>" class="btn btn-xs btn-info">Edit</a>
<!-- <input type="button" name="view" data-remodal-target="remodal" value="Reprint"  class="btn btn-xs btn-warning" /> -->
<?php } ?>
<a href="action/action_delete_bill.php?del=<?php echo $obj['billId'];?>" class="btn btn-xs btn-danger">Delete</a>

</td>
</div></div></div>
 </tr>
 <?php  } ?> 


</tbody>
    
    </table>
</div>
</div>
<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>



<!-- /.row small-spacing -->    
<?php include 'footer.php'; ?>
</div>
<!-- /.main-content -->
</div><!--/#wrapper -->
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="assets/script/html5shiv.min.js"></script>
<script src="assets/script/respond.min.js"></script>
<![endif]-->
<!-- 
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="assets/scripts/jquery.min.js"></script>
<script src="assets/scripts/modernizr.min.js"></script>
<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
<script src="assets/plugin/waves/waves.min.js"></script>
<!-- Full Screen Plugin -->
<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

<!-- Responsive Table -->
<script src="assets/plugin/RWD-table-pattern/js/rwd-table.min.js"></script>
<script src="assets/scripts/rwd.demo.min.js"></script>

 <script src="assets/plugin/modal/remodal/remodal.min.js"></script>
 
<script src="assets/scripts/main.min.js"></script>
<script src="assets/color-switcher/color-switcher.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js"></script>
    <script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'csv', 'pdf' ]
        } );
     
        table.buttons().container()
            .appendTo( '#example_wrapper .col-md-6:eq(0)' );
    } );
     </script>
<script>
$(function($) {
$('#example').DataTable();

$('#example2').DataTable( {
"scrollY":        "300px",
"scrollCollapse": true,
"paging":         false
} );

$('#example3').DataTable();
});
</script>

<!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
<?php 
function get($input){
    return($_GET[$input]);
}
?>
<div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <div class="remodal-content">
        <h2 id="modal1Title">Print With Header</h2>
    </div>
    <a href="bill_print_with_header.php?bill_id=<?php echo $obj['billId'];?>" class="remodal-confirm">Yes</a>
    <a href="bill_print_without_header.php?bill_id=<?php echo $obj['billId'];?>" class="remodal-cancel">No</a>
</div>

</body>
</html>

<div id="dataModal" class="modal fade">  
<div class="modal-dialog modal-lg">  
<div class="modal-content">  
<div class="modal-header">  
<button type="button" class="close" data-dismiss="modal">&times;</button>  
<h4 class="modal-title">Bill Details</h4>  
</div>  
<div class="modal-body" id="usr_id">  
</div>  
<div class="modal-footer"> 
<!-- <a href="add_user.php"><button type="button" class="btn btn-default">Add</button> </a> -->
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
</div>  
</div>  
</div>  
</div> 

<script type="text/javascript">

  $(document).on('click', '.view_data', function(){  
var usr_id = $(this).attr("id");
// alert (usr_id); 
if(usr_id != '')  
{  
$.ajax({  
url:"action/list_bill_receipt_by_id.php",  
method:"POST",  
data:{usr_id:usr_id},  
success:function(data){ 
$('#usr_id').html(data);  
$('#dataModal').modal('show');  
}  
});  
}            
});
</script>
<!-- /.col-md-12 -->
