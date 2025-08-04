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
<!-- /.main-menu -->
<?php include 'top_header.php'; ?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<?php
$id = $_GET['id'];
$estimation_date = $_GET['estimation_date'];
// echo $billDate;
?>
<!-- /.col-lg-6 col-xs-12 -->   
<!-- /.col-xs-12 -->
<div class="box-content card white">
<h4 class="box-title">Estimation Receipt Form</h4>
 
<form id="pre_form">
<div class="card-content">
<div class="row">
    <div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Estimation ID</label>
<input type="text" class="form-control" id="en_firstname" name="en_firstname" value="<?php echo $id;?>" readonly="">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Estimation Date</label>
<input type="text" class="form-control" id="en_lastname" name="en_lastname" value="<?php echo $estimation_date;?>" readonly="">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Estimation Total</label>
<input type="email" class="form-control" id="email" name="email">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Description(EN)</label>
<textarea type="number" class="form-control" id="en_phone_no" name="en_phone_no" required="">
</textarea>
</div>
</div>

<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Received Amount</label>
<input type="text" class="form-control arabic" id="ar_firstname">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Receipt Date</label>
<input type="date" class="form-control arabic" id="ar_lastname" name="ar_lastname" pattern="[a-zA-Z. ]{1,}" required="" >
</div>

<div class="form-group">
<label for="exampleInputEmail1">Payment</label>
<input type="number" class="form-control arabic" id="ar_phone_no" name="ar_phone_no" required="">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Description(AR)</label>
<textarea type="number" class="form-control arabic" id="ar_landline" name="ar_landline">
  </textarea>
</div>
</div>
</div>
<p class="text-center"><button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>
</div>



</form>
<?php if ($_SESSION['msg'] != null) { ?>

<div class="alert alert-danger" id="alerts">
<?php
if ($_SESSION['msg'] == "success") {
//echo "successfully added";
}
?>
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
// alert("sfkmlj");
$('#alerts').hide();
var en_firstname = $("#en_firstname").val();
var en_lastname = $("#en_lastname").val();
var email = $("#email").val();
var en_phone_no = $("#en_phone_no").val();
var en_landline = $("#en_landline").val();
var en_address = $("#en_address").val();
var ar_firstname = $("#ar_firstname").val();
var ar_lastname = $("#ar_lastname").val();
var ar_phone_no = $("#ar_phone_no").val();
var ar_landline = $("#ar_landline").val();
var ar_address = $("#ar_address").val();
// if(userName=="" || fathername=="" ){
// alert("Enter all the Fields");
// }else{
$.ajax({

type: "GET",
url: 'action/action_create_client.php',
data: "en_firstname="+en_firstname+"&en_lastname="+en_lastname+"&email="+email+"&en_phone_no="+en_phone_no+"&en_landline="+en_landline+"&en_address="+en_address+"&ar_firstname="+ar_firstname+"&en_address="+en_address+"&ar_lastname="+ar_lastname+"&ar_phone_no="+ar_phone_no+"&ar_landline="+ar_landline+"&ar_address="+ar_address, 
success: function(data) {
/*  if($.trim(data)=="exists"){
$('#alerts').html("Brand name already exists");
}else*/ 
// alert(data);
if($.trim(data)=="success"){
alert("successfully added");
$("#en_firstname").val(""); 
$("#en_lastname").val("");
$("#email").val("");
$("#en_phone_no").val("");
$("#en_landline").val("");
$("#en_address").val("");
$("#ar_firstname").val("");
$("#ar_lastname").val("");
$("#ar_phone_no").val("");
$("#ar_landline").val("");
$("#ar_address").val("");

}else{
$('#alerts').html("Failure some connection issues");

}

  window.open('print_sidebar_bill.php?bill_id='+data);
   window.location.href='list_bill.php';

window.location.href='add_client.php';

$('#alerts').show();
}

});
}
// }
</script>

<!-- <script type="text/javascript">
            function callResult(){
                var formValid = document.forms["pre_form"].checkValidity();
                return formValid;
            }
</script> -->

</body>
</html>
</body>
</html>