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

<link rel="stylesheet" href="assets/styles/style.min.css">

<!-- Material Design Icon -->
<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

<!-- Sweet Alert -->
<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

<!-- Percent Circle -->
<link rel="stylesheet" href="assets/plugin/percircle/css/percircle.css">

<!-- Chartist Chart -->
<link rel="stylesheet" href="assets/plugin/chart/chartist/chartist.min.css">

<!-- FullCalendar -->
<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.min.css">
<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

</head>

<body>

<?php include 'side_header.php'; ?>

<?php include 'top_header.php'; ?>
  
<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
<div class="box-content">
  <h4 class="box-title">Bill Due List <!-- <p class="text-right"><a href="bill.php"><button type="button" class="btn waves-effect waves-light">Add New</button></a></p> --></h4>
  
  
  <div class="table-responsive" data-pattern="priority-columns">

<table id="example" class="table table-small-font table-bordered table-striped">
<thead>
<tr>
<th>Bill Id</th>
<th>Vendor Name(EN)</th>
<th class="arab">اسم البائع</th>
<th>Phone Number(EN)</th>
<th class="arab">رقم الجوال</th>
<th>Total</th>
<th>Paid Amount</th>
<th>Pending</th>
<th>Action</th>
</tr>
</thead>
<tbody>
 
<?php
 
include('helpers/config.php');
 
$query = "select b.vendor_id,v.en_vname,v.ar_vname,v.en_phone,v.ar_phone,sum(b.total)total,b.received_amount,(sum(b.total)-sum(b.received_amount))Due from bill b,vendor v where b.vendor_id=v.id group by b.vendor_id;";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
 
while ($row = mysqli_fetch_array($result)) {
$obj = array(
"vendor_id" => $row['vendor_id'],
"en_vname" => $row['en_vname'],  
"ar_vname" => $row['ar_vname'], 
"en_phone" => $row['en_phone'],
"ar_phone" => $row['ar_phone'],  
"total" => $row['total'],
"received_amount" => $row['received_amount']);
?>

<tr>

<td><?php echo $obj['vendor_id'];?></td>
<td><?php echo $obj['en_vname'];?></td>
<td><span class="arabic"><?php echo $obj['ar_vname'];?></span></td>
<td><?php echo $obj['en_phone'];?></td>
<td><span class="arabic"><?php echo $obj['ar_phone'];?></span></td>
<td><?php echo $obj['total'];?></td>
<td><?php echo $obj['received_amount'];?></td>
<!-- <td><?php echo $obj['due'];?></td> -->
<td><?php $pending = $obj['total']-$obj['received_amount'];
echo $pending; ?></td>
 
<td>
<input type="button" name="view" value="Details" id="<?php echo $row["vendor_id"]; ?>" class="btn btn-info btn-xs view_data" /></td>
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

<!-- Google Chart -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<!-- chart.js Chart -->
<script src="assets/plugin/chart/chartjs/Chart.bundle.min.js"></script>
<script src="assets/scripts/chart.chartjs.init.min.js"></script>

<!-- FullCalendar -->
<script src="assets/plugin/moment/moment.js"></script>
<script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
<script src="assets/scripts/fullcalendar.init.js"></script>

<!-- Sparkline Chart -->
<script src="assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
<script src="assets/scripts/chart.sparkline.init.min.js"></script>

<script src="assets/scripts/main.min.js"></script>
<script src="assets/color-switcher/color-switcher.min.js"></script>
</html>

<div id="dataModal" class="modal fade">  
<div class="modal-dialog modal-lg">  
<div class="modal-content">  
<div class="modal-header">  
<button type="button" class="close" data-dismiss="modal">&times;</button>  
<h4 class="modal-title">Bill Due Details</h4>  
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
url:"action/list_bill_due_report_by_id.php",  
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
</body>
</html>
