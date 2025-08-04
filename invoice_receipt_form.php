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
<!-- /.main-menu -->
<?php include 'top_header.php'; ?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<?php
$invoice_id = $_GET['id'];
include_once 'process/dao.php';
$cval = listInvoiceById($invoice_id);

foreach ($cval as $cval) {
$pending = $cval['total']-$cval['received_amount']; 
?>
<!-- /.col-lg-6 col-xs-12 -->   
<!-- /.col-xs-12 -->
<div class="box-content card white">
<h4 class="box-title">Invoice Receipt Form</h4>
  <div class="row"><span id="error"></span></div>
   <div class="row"><span id="error2"></span></div>

<div class="card-content">
  <div class="row"><span id="error"></span></div>
<div class="row">
    <div class="col-md-6">
   
<div class="form-group">
<label for="exampleInputinvoice_total1">Invoice ID</label>
<input type="text" class="form-control" id="invoice_id" name="invoice_id" value="<?php echo $invoice_id;?>" readonly="">
</div>

<input type="hidden" id="received_amount" name="received_amount" value="<?php echo $cval['received_amount'];?>">
<!-- <input type="hidden" id="total" name="total" value="<?php echo $cval['total'];?>"> -->
<input type="hidden" id="pending" name="pending" value="<?php echo $pending;?>">

<div class="form-group">
<label for="exampleInputinvoice_total1">Invoice Date</label>
<input type="text" class="form-control" id="invoice_date" name="invoice_date" value="<?php echo $cval['issue_date'];?>" readonly="">
</div>

<div class="form-group">
<label for="exampleInputinvoice_total1">Invoice Total</label>
<input type="text" class="form-control" id="invoice_total" name="invoice_total" value="<?php echo $cval['total'];?>" readonly="">
</div>

<div class="form-group">
<label for="exampleInputinvoice_total1">Description<span class="required">*</span></label>
<textarea type="number" class="form-control" id="en_description" name="en_description" required="">
</textarea>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="exampleInputinvoice_total1">Pending</label>
<input type="text" class="form-control" id="pending" name="pending" value="<?php echo $pending;?>" readonly="">
</div>

<div class="form-group">
<label for="exampleInputinvoice_total1">Receipt Date<span class="required">*</span></label>
<input type="text" class="form-control receipt_date" id="datepicker-autoclose" name="receipt_date" placeholder="mm/dd/yyyy" required >
</div>

<div class="form-group">
<label for="exampleInputinvoice_total1">Payment<span class="required">*</span></label>
<input type="number" class="form-control" id="payment" name="payment" required="">
</div>

<div class="form-group">
<label for="exampleInputinvoice_total1" class="arabic">الوصف</label>
<textarea type="number" class="form-control arabic" id="ar_description" name="ar_landline">
  </textarea>
</div>
</div>
</div>
<p class="text-center"><button type="button" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>
</div>

 <?php } ?>
<!-- /.card-content -->

<!-- /.row -->

<!-- /.row small-spacing -->    
<?php include 'footer.php'; ?>
</div>
<!-- /.main-content -->
</div>
<!--/#wrapper -->
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

<!-- Flex Datalist -->
<script src="assets/plugin/flexdatalist/jquery.flexdatalist.min.js"></script>

<!-- Popover -->
<script src="assets/plugin/popover/jquery.popSelect.min.js"></script>

<!-- Select2 -->
<script src="assets/plugin/select2/js/select2.min.js"></script>

<!-- Multi Select -->
<script src="assets/plugin/multiselect/multiselect.min.js"></script>

<!-- Touch Spin -->
<script src="assets/plugin/touchspin/jquery.bootstrap-touchspin.min.js"></script>

<!-- Timepicker -->
<script src="assets/plugin/timepicker/bootstrap-timepicker.min.js"></script>

<!-- Colorpicker -->
<script src="assets/plugin/colorpicker/js/bootstrap-colorpicker.min.js"></script>

<!-- Datepicker -->
<script src="assets/plugin/datepicker/js/bootstrap-datepicker.min.js"></script>

<!-- Moment -->
<script src="assets/plugin/moment/moment.js"></script>

<!-- DateRangepicker -->
<script src="assets/plugin/daterangepicker/daterangepicker.js"></script>

<!-- Maxlength -->
<script src="assets/plugin/maxlength/bootstrap-maxlength.min.js"></script>

<!-- Demo Scripts -->
<script src="assets/scripts/form.demo.min.js"></script>

<script src="assets/scripts/main.min.js"></script>

<script type="text/javascript">
function callResult(){
  //alert("sfkmlj");
$('#alerts').hide();
var invoice_id = $("#invoice_id").val();
var invoice_date = $("#invoice_date").val();
var invoice_total = $("#invoice_total").val();
var payment = $("#payment").val();
var received_amount = $("#received_amount").val();
var receipt_date = $(".receipt_date").val();
var en_description = $("#en_description").val();
var ar_description = $("#ar_description").val(); 
var total = $("#total").val(); 
var pending = $("#pending").val(); 
//alert(en_description);

// alert(pending );
// alert(payment );
var error='';
var error2='';
if(receipt_date =='' || en_description =='' || payment =='' ){

alert("Enter all Fields");


}else{

$.ajax({
 
type: "GET",
url: 'action/action_invoice_receipt.php',
data: "invoice_id="+invoice_id+"&invoice_date="+invoice_date+"&invoice_total="+invoice_total+"&payment="+payment+"&received_amount="+received_amount+"&receipt_date="+receipt_date+"&en_description="+en_description+"&receipt_date="+receipt_date+"&ar_description="+ar_description, 
success: function(data) {
// alert(data);
if($.trim(data)!=""){
 window.open('invoice_receipt_print.php?id='+data);
window.location.href='list_invoice.php';
 
}else{
$('#alerts').html("Failure some connection issues");

}

// window.location.href='list_invoice.php';

$('#alerts').show();
}

});
}
}
</script>

</body>
</html>
</body>
</html>