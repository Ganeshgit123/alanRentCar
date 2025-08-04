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
     <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4>Pending Task List</h4></div>
    <div class='col-md-4'></div>
    <div class='col-md-2'>
        <?php if ($_SESSION["user_level"]==1) {
     ?>
        <a href='assign_task.php'><button class="btn btn-warning">Assign Task</button></a>
        <?php }?>
       
    </div>
    <div class='col-md-2'> 
 <a href='completed_task_list.php'><button class="btn btn-success">Completed Task</button></a>
    </div>
</div>

<div class="card-content">
  
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<tr>
<th>Id</th>
<th>uId</th>
<th>Name</th>
<th>Task</th>
<th>Description</th>
<th>Start Date</th>
<th>End Date</th>
<th>Document</th> 
<th>Status</th>
<th>Action</th>
</tr>
</tr>
      
        </thead>
       <tbody>

<?php
require_once 'process/dao.php';
$user = getUserDetailsById($_SESSION["user"]);
foreach ($user as $dval) {
 $userId=$dval['id'];
$userLevel=$dval['user_level'];
}

$val= pendingTaskDetails($userLevel,$userId);
$count = 0;
foreach ($val as $cval) {

$count = $count+1;
?>

<tr>
<td><?php echo $count; ?></td>
<td><?php echo $cval['uuid']?></td>
<td><?php echo $cval['en_firstname']." ".$cval['en_lastname']?></td>
<td><?php echo $cval['task_title']?></td>
<td><?php echo $cval['task_description']?></td>
<td><?php echo $cval['start_date']?></td>
<td><?php echo $cval['end_date']?></td>
<td><u><a href="download.php?docu=<?php echo $cval['document_name']?>" class="btn btn-info btn-xs waves-effect waves-light">Download</a></u></td>

<?php if($cval['nstatus']=='A'){ ?>
<td><?php if($cval['status']=='P'){
echo 'Pending';
}else{
echo 'Complete';
}?></td>
<td><?php if($cval['status']=='P'){ ?>
<a href="action/action_update_pending_status.php?id=<?php  echo $cval['id']?>&status=<?php  echo 'Y'?>">
<button type="button" class="btn btn-danger btn-xs waves-effect waves-light">Complete</button></a>
<?php }else{?>
<a href="action/action_update_pending_status.php?id=<?php  echo $cval['id']?>&status=<?php  echo 'P'?>">
<button type="button" class="btn btn-success btn-xs waves-effect waves-light">Pending</button>
</a><?php } ?>
</td>
<?php } ?> 

<?php if ($_SESSION["user_level"]==2) {
     ?>
<td>
    <?php if($cval['nstatus']=='N'){ ?>
<a href="action/action_update_task_accept_status.php?id=<?php  echo $cval['id']?>&nstatus=<?php echo 'A'?>">
<button type="button" class="btn btn-success btn-xs waves-effect waves-light">Accept</button></a>
<?php 
} ?>
</td>
<?php }?>
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

<script src="assets/scripts/main.min.js"></script>
<script src="assets/color-switcher/color-switcher.min.js"></script>
</body>
</html>

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
</body>
</html>
