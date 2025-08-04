<?php
session_start();
error_reporting(E_ALL);
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
    <div class='col-md-4'><h4> Estimation List</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        <a href='estimation.php'><button class="btn btn-warning">Add New</button></a>
    </div>
</div>

<div class="card-content">
  
 <div class="table-responsive">
  <table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
      <tr>
<th>s.no<?php echo $_SESSION["user_level"] ?> </th>
<th width="150">Client Name</th>
<th >Estimation Date</th>
<th>Expiry Date</th>
<th>Total</th>
<th>Pending Amount</th>
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
    $query = "select (e.id)estimation_id, e.client_id, c.en_firstname, c.en_com_name,c.ar_com_name,e.estimation_date,e.po_number,e.expiry_date,e.total,(u.en_firstname)Uen_firstname,u.en_lastname
from estimation e,users u, clients c where c.id=e.client_id and u.id=e.created_by and e.created_by=".$_SESSION["user"]." order by e.id DESC";

}else{
$query = "select (e.id)estimation_id,e.client_id,c.en_firstname, c.en_com_name,c.ar_com_name,e.estimation_date,e.po_number,e.expiry_date,e.total,(u.en_firstname)Uen_firstname,u.en_lastname
from estimation e,users u, clients c where c.id=e.client_id and u.id=e.created_by order by e.id DESC";
}
$result = mysqli_query($conn, $query) 
or die(mysqli_error($conn));
 $count=0;
while ($row = mysqli_fetch_array($result)) {
$obj = array("estimation_id" => $row['estimation_id'],
"en_firstname" => $row['en_firstname'], 
// "client_id" => $row['client_id'], 
"estimation_date" => $row['estimation_date'],  
"po_number" => $row['po_number'], 
"en_com_name" => $row['en_com_name'],
"ar_com_name" => $row['ar_com_name'],
"expiry_date" => $row['expiry_date'],
"total" => $row['total'],
"Uen_firstname" => $row['Uen_firstname'],
"en_lastname" => $row['en_lastname']);

$count=$count+1;

// SELECT (i.id)iId,i.estimation_no,sum(i.total)iTot,(e.total)eTot FROM invoice i,estimation e where i.estimation_no=".$obj['estimation_id'].";


$query2 = "SELECT i.estimation_no,sum(i.total)iTot,(e.total)eTot FROM invoice i,estimation e where i.estimation_no=".$obj['estimation_id']." and e.id=i.estimation_no;";
$result2 = mysqli_query($conn,$query2) ;
 $row = mysqli_fetch_assoc($result2);
 // $IId=$row['iId'];
$IC = $row['estimation_no'];
$ITOT = $row['iTot'];
$ETOT = $row['eTot'];
// echo $IC;
if($IC){
    $estpending = $ETOT - $ITOT;
}else{
    $estpending = $obj['total'];
}
// echo $query2;
?>

<tr>
<td><?php echo $count; ?></td>
<td><?php echo $obj['en_com_name'].' / '.$obj['ar_com_name']; ?></td>
<td><?php echo date('d/m/Y',strtotime($obj['estimation_date']));?></td>

<td><?php echo date('d/m/Y',strtotime($obj['expiry_date']));?></td>
<td><?php echo $obj['total'];?></td>

<td><?php echo $estpending;?></td>

<?php if($_SESSION["user_level"]==1){ echo "<td>".$obj['Uen_firstname']." ".$obj['en_lastname']."</td>"; } ?>


<td>
<input type="button" name="view" value="Details" id="<?php echo $obj["estimation_id"]; ?>" class="btn btn-info btn-xs view_data" />

<a href="print_sidebar_estimation.php?estimation_id=<?php echo $obj['estimation_id'];?>" target="_blank"  class="btn btn-xs btn-warning">Reprint</a>

 <?php if ($estpending !='0') { ?> 
<a href="invoice.php?id=<?php echo $obj['estimation_id'];?>&available=<?php echo $estpending;?>" class="btn btn-xs btn-success">Create Invoice</a>
    <?php   }?> 


<a href="update_estimation.php?id=<?php echo $obj['estimation_id'];?>" class="btn btn-xs btn-danger">Edit</a>


<a href="action/action_delete_estimation.php?del=<?php echo $obj['estimation_id'];?>" class="btn btn-xs btn-danger">Delete</a>
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

<script src="assets/scripts/jquery.min.js"></script>
    <script src="assets/scripts/modernizr.min.js"></script>
    <script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="assets/plugin/nprogress/nprogress.js"></script>
    <script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
    <script src="assets/plugin/waves/waves.min.js"></script>
    <!-- Full Screen Plugin -->
    <script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

    <!-- Remodal -->
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
    <a href="estimation_print_with_header.php?estimation_id=<?php echo $obj['estimation_id'];?>" class="remodal-confirm">Yes</a>
    <a href="estimation_print_without_header.php?estimation_id=<?php echo $obj['estimation_id'];?>" class="remodal-cancel">No</a>
</div>

<div class="remodal" data-remodal-id="remodal1" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <div class="remodal-content">
        <h2 id="modal1Title">Print With Header</h2>
    </div>
    <a href="invoice_with_print.php?invoice_id=<?php echo $IId;?>" class="remodal-confirm">Yes</a>
    <a href="invoice_without_print.php?invoice_id=<?php echo $IId;?>" class="remodal-cancel">No</a>
</div>
</body>
</html>

<div id="dataModal" class="modal fade">  
<div class="modal-dialog modal-lg">  
<div class="modal-content">  
<div class="modal-header">  
<button type="button" class="close" data-dismiss="modal">&times;</button>  
<h4 class="modal-title">Invoice Details</h4>  
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
url:"action/list_estimation_by_id.php",  
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
