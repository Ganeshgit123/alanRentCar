<?php
session_start();
error_reporting(0);

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

<title>Add-Company</title>

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

<!-- /.col-lg-6 col-xs-12 -->		
<!-- /.col-xs-12 -->
<div class="box-content card white">
<h4 class="box-title">Add Company</h4>
 
<form>
<div class="card-content">
<div class="row">
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Name (EN)</label>
<input type="text" class="form-control" id="en_name" placeholder="Name" name="en_name" pattern="[a-zA-Z. ]{1,}" required=""
oninvalid="this.setCustomValidity('Please enter your  name')" oninput="setCustomValidity('')">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Phone Number (EN)</label>
<input type="number" class="form-control" id="en_phone_no" name="en_phone_no" placeholder="Phone No" required=""
oninvalid="this.setCustomValidity('Please enter your Phone no.')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address (Add (comma ,)for next line)</label>
<textarea class="form-control" id="en_address" name="en_address" placeholder="Write your address"></textarea>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Email address</label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email Id" required=""
oninvalid="this.setCustomValidity('Please enter your emailId')" oninput="setCustomValidity('')">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Bank Details</label>
<input type="text" class="form-control" id="en_bank_details" placeholder="Bank Details" name="en_bank_details" pattern="[a-zA-Z. ]{1,}" required=""
oninvalid="this.setCustomValidity('Please enter your  name')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Vat No</label>
<input type="text" class="form-control" id="en_vat" placeholder="Vat No" name="en_vat" pattern="[a-zA-Z. ]{1,}" required=""
oninvalid="this.setCustomValidity('Please enter your  name')" oninput="setCustomValidity('')">
</div>
<!-- <div class="form-group">
<label for="exampleInputEmail1">Tax No</label>
<input type="text" class="form-control" id="en_tax" placeholder="name" name="en_tax" pattern="[a-zA-Z. ]{1,}" required=""
oninvalid="this.setCustomValidity('Please enter your  name')" oninput="setCustomValidity('')">
</div> -->
</div>
		
<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1" class="arabic">اسم</label>
<input type="text" class="form-control arabic" id="ar_name" placeholder="اسم" name="ar_name" pattern="[a-zA-Z. ]{1,}" required=""
oninvalid="this.setCustomValidity('Please enter your  name')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic">رقم الجوال</label>
<input type="number" class="form-control arabic" id="ar_phone_no" name="ar_phone_no" placeholder="رقم الجوال" required=""
oninvalid="this.setCustomValidity('Please enter your Phone no.')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic">العنوان ( أضف فاصلة للسطر الثاني )</label>
<textarea class="form-control arabic" id="ar_address" name="ar_address" placeholder="العنوان"></textarea>
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
var en_name = $("#en_name").val();
var ar_name = $("#ar_name").val();
var en_phone_no = $("#en_phone_no").val();
var ar_phone_no = $("#ar_phone_no").val();
var en_address = $("#en_address").val();
var ar_address = $("#ar_address").val();
var email = $("#email").val();

var en_bank_details = $("#en_bank_details").val();
// var ar_bank_details = $("#ar_bank_details").val();
var en_vat = $("#en_vat").val();
// var ar_vat = $("#ar_vat").val();
var en_tax = $("#en_tax").val();
// var ar_tax = $("#ar_tax").val();


// if(userName=="" || fathername=="" ){
// alert("Enter all the Fields");
// }else{
$.ajax({

type: "GET",
url: 'action/action_create_company_details.php',
data: "en_name="+en_name+"&ar_name="+ar_name+"&en_phone_no="+en_phone_no+"&ar_phone_no="+ar_phone_no+"&en_address="+en_address+"&ar_address="+ar_address+"&email="+email+"&en_bank_details="+en_bank_details+"&en_vat="+en_vat+"&en_tax="+en_tax, 
success: function(data) {
/*  if($.trim(data)=="exists"){
$('#alerts').html("Brand name already exists");
}else*/ 
alert(data);
if($.trim(data)=="success"){
alert("successfully added");
$("#en_name").val("");
$("#ar_name").val("");
$("#en_phone_no").val("");
$("#ar_phone_no").val("");
$("#en_address").val(""); 
$("#ar_address").val("");
$("#email").val("");
$("#en_bank_details").val("");  
$("#en_vat").val("");
$("#en_tax").val(""); 

}else{
$('#alerts').html("Failure some connection issues");

}

window.location.href='add_company.php';

$('#alerts').show();
}

});
}
// }
</script>
</body>
</html>
</body>
</html>