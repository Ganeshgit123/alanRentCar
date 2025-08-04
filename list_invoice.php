<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
} 
error_reporting(0);

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

<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

<!-- Sweet Alert -->
<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

<!-- Table Responsive -->
<link rel="stylesheet" href="assets/plugin/RWD-table-pattern/css/rwd-table.min.css">

<link rel="stylesheet" href="assets/plugin/modal/remodal/remodal.css">
    <link rel="stylesheet" href="assets/plugin/modal/remodal/remodal-default-theme.css">

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
    <div class='col-md-4'><h4> Invoice List</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        <a href='invoice.php'><button class="btn btn-warning">Add New</button></a>
    </div>
</div>

<div class="card-content">
  
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>Id</th>
<th>Client Id</th>
<th>Client Name</th>
<th width="150">Company Name</th>
<th>PO Number</th>
<th>Invoice No</th>
<th>Total</th>
<th>Received Amount</th>
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
require_once 'process/dao.php';
if ($_SESSION["user_level"]==2) {
  $val= listInvoice($_SESSION["user"]);
  // echo $val;
}else{
$val= listInvoice(0);
}
$count=0;
foreach ($val as $cval) {
$count=$count+1;
include('helpers/config.php'); 
$query2 = "SELECT invoice_id FROM invoice_receipt_details i where invoice_id=".$cval['id'].";";
$result2 = mysqli_query($conn,$query2) ;
 $row = mysqli_fetch_assoc($result2);
 $IId=$row['invoice_id'];

// $IC = $row['estimation_no'];
?>

<tr>
<td><?php echo $count; ?></td>
<td><?php echo "YSC".$cval['cId']?></td>
<td><?php echo $cval['cName']?></td>
<td><?php echo $cval['coName']?></td>
<td><?php echo $cval['po_number']?></td>
<td><?php echo "YSTX".$cval['id']?></td>
<td><?php echo $cval['total']?></td>
<td><?php echo $cval['received_amount']?></td>
<td><?php echo $cval['total']-$cval['received_amount']; ?></td>
<td><?php if($cval['status']=='P'){
  echo 'Pending';
}else{
  echo 'Completed';
}?></td>

<?php if($_SESSION["user_level"]==1){ echo "<td>".$cval['Uen_firstname']." ".$cval['en_lastname']."</td>"; } ?>

<td>

  <input type="button" name="view" value="Details" id="<?php echo $cval["id"]; ?>" class="btn btn-info btn-xs view_data" />

<?php if($cval['status']=='P') { ?>
      <a href="invoice_receipt_form.php?id=<?php echo $cval['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-xs btn-success  waves-effect waves-light">Receipt</button></a> 

 <?php   }?>
 
        <a href="print_sidebar_invoice.php?invoice_id=<?php echo $cval['id'];?>" target="_blank" class="btn btn-xs btn-warning">Reprint</a>
      <?php if ($IId=='') { ?>
       <!--  <a href="update_invoice.php?invoice_id=<?php echo $cval['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-xs btn-info  waves-effect waves-light">Edit</button></a> -->

    
       <a href="update_invoice.php?id=<?php echo $cval['id']?>" class="btn btn-xs btn-info">Edit</a>

   <?php   }?>
      
<a href="action/action_delete_invoice.php?del=<?php echo $cval['id'];?>" class="btn btn-xs btn-danger">Delete</a>

</tr>     
<?php } ?> 


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
    <a href="invoice_print_with_header.php?invoice_id=<?php echo $cval['id'];?>" class="remodal-confirm">Yes</a>
    <a href="invoice_print_without_header.php?invoice_id=<?php echo $cval['id'];?>" class="remodal-cancel">No</a>
</div>

</body>
</html>

<div id="dataModal" class="modal fade">  
<div class="modal-dialog modal-lg">  
<div class="modal-content">  
<div class="modal-header">  
<button type="button" class="close" data-dismiss="modal">&times;</button>  
<h4 class="modal-title">Invoice Receipt Details</h4>  
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
url:"action/list_invoice_receipt_by_id.php",  
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
