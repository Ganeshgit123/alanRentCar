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
<div class="box-content">
	<h1 class="box-title">Estimation Based Report</h1>
	 <div class="table-responsive">
<table id="example" class="table table-striped table-bordered" style="width:100%">
<thead>
<tr>
<th>Id</th>
<th>Estimation No</th>
<th>Invoice Number</th>
<th>Total</th>
<th>Action</th>
</tr>
      
</thead>
<tbody>

<?php
require_once 'process/dao.php';
$val= estimationBasedDetailsReport($_SESSION["user_level"]);
$count=0;
foreach ($val as $cval) {
$count=$count+1;
?>

<tr>
<td><?php echo $count ?></td>
<td><a href="print_sidebar_estimation.php?estimation_id=<?php echo $cval['estimationId']?>"><?php echo "YSE".$cval['estimationId']?></a></td>
<td><a href="print_sidebar_invoice.php?invoice_id=<?php echo $cval['invoice_ID']?>"><?php echo "YSTS".$cval['invoice_ID']?></a></td>
<td><?php echo $cval['total']?></td>
 
<td><input type="button" name="view" value="Details" id="<?php echo $cval["estimationId"]; ?>" class="btn btn-info btn-xs view_data" /></td>
</tr>     
<?php } ?> 


</tbody>
    
    </table>
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

<script src="assets/scripts/main.min.js"></script>
<script src="assets/color-switcher/color-switcher.min.js"></script>
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

 
<!-- /.col-md-12 -->
</div>
</div>
</div>
<!-- /.col-md-6 -->
</div>
<!-- /.row -->

</div>
<!-- /.container-fluid -->
</section>
<!-- /.section -->

</div>
<!-- /.main-page -->


<!-- /.right-sidebar -->

</div>
<!-- /.content-container -->
</div>
<!-- /.content-wrapper -->

</div>
<!-- /.main-wrapper -->

<!-- ========== COMMON JS FILES ========== -->
<script src="js/jquery/jquery-2.2.4.min.js"></script>
<script src="js/bootstrap/bootstrap.min.js"></script>
<script src="js/pace/pace.min.js"></script>
<script src="js/lobipanel/lobipanel.min.js"></script>
<script src="js/iscroll/iscroll.js"></script>

<!-- ========== PAGE JS FILES ========== -->
<script src="js/prism/prism.js"></script>
<script src="js/DataTables/datatables.min.js"></script>

<!-- ========== THEME JS ========== -->
<script src="js/main.js"></script>

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
            buttons: [ 'copy', 'excel', 'csv', 'pdf', 'colvis' ]
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

<script type="text/javascript">

  $(document).on('click', '.view_data', function(){  
var usr_id = $(this).attr("id");
 // alert (usr_id); 
if(usr_id != '')  
{  
$.ajax({  
url:"action/list_estimation_based_details.php",  
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
</body>
</html>
