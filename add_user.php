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

<title>Add_User</title>

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

<!-- Color Picker -->
<link rel="stylesheet" href="assets/color-switcher/color-switcher.min.css">

<script>
function checkAvailabilityUuid() {
//alert();
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
//alert();
data:'uuid='+$("#uuid").val(),
type: "POST",
success:function(data){
	//alert(data);
$("#stats").html(data);
//alert();
$("#loaderIcon").hide();
},
error:function (){
// alert();
}
});
}
</script>

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
<div class="box-title row">
    <div class='col-md-4'><h4>Add User</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        <a href='user_list.php'><button class="btn btn-warning">User List</button></a>
    </div>
</div>

<div class="card-content">
	<div class="row"><span id="error"></span></div>
	
<div class="row">
		<div class="col-md-6">
		<div class="form-group">
<label for="exampleInputEmail1">User Id<span id="stats"><span class="required">*</span></label>
<input type="text" class="form-control" id="uuid" placeholder="User Id" name="uuid" onblur="checkAvailabilityUuid()">
</div>
<div class="form-group">
<label for="exampleInputEmail1">First Name (EN)<span class="required">*</span></label>
<input type="text" class="form-control" id="en_firstname" placeholder="First name" name="en_firstname" pattern="[a-zA-Z. ]{1,}" required="" oninvalid="this.setCustomValidity('Please enter your First name')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Last Name (EN)<span class="required">*</span></label>
<input type="text" class="form-control" id="en_lastname" placeholder="Last name" name="en_lastname" pattern="[a-zA-Z. ]{1,}" required="" 
oninvalid="this.setCustomValidity('Please enter your Last name')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email address<span class="required">*</span></label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email Id" required=""
oninvalid="this.setCustomValidity('Please enter your emailId')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputPassword1">Password<span class="required">*</span></label>
<input type="password" class="form-control" id="upassword" name="upassword" placeholder="Password"  required=""
oninvalid="this.setCustomValidity('Please enter Valid password')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputPassword1">User-Level<span class="required">*</span></label>
<select class="form-control" name="user_level" id="user_level">
	<optgroup>
		<option value="">Select</option>
		<option value="1">Admin</option>
		<option value="2">User</option>
	</optgroup>
</select>
</div>
		</div>
		<div class="col-md-6">
		<div class="pa"></div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>الإسم الاول </label>
<input type="text" class="form-control arabic" id="ar_firstname" placeholder="الإسم الاول " name="ar_firstname" pattern="[a-zA-Z. ]{1,}" required=""
oninvalid="this.setCustomValidity('Please enter your First name')" oninput="setCustomValidity('')">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>الإسم الأخير</label>
<input type="text" class="form-control arabic" id="ar_lastname" placeholder="الإسم الأخير" name="ar_lastname" pattern="[a-zA-Z. ]{1,}" required="" 
oninvalid="this.setCustomValidity('Please enter your Last name')" oninput="setCustomValidity('')">
</div>
</div>
</div>
<p class="text-center"><button type="submit" id="submit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>
</div>




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
var uuid = $("#uuid").val();
var en_firstname = $("#en_firstname").val();
var en_lastname = $("#en_lastname").val();
var email = $("#email").val();
var upassword = $("#upassword").val();
var user_level = $("#user_level").val();
var ar_firstname = $("#ar_firstname").val();
var ar_lastname = $("#ar_lastname").val();
//alert(uuid);

// if(userName=="" || fathername=="" ){
// alert("Enter all the Fields");
// }else{
	var error=''
	if (uuid==''|| en_firstname=='' || en_lastname=='' || email=='' || upassword=='' || user_level=='' || ar_firstname=='' ||ar_lastname=='') {
		error='Enter all fields';
		$('#error').html('<div class="alert alert-danger">'+error+'</div>');
	}
	else{
$.ajax({

type: "POST",
url: 'action/action_create_user.php',
data: "en_firstname="+en_firstname+"&en_lastname="+en_lastname+"&email="+email+"&upassword="+upassword+"&user_level="+user_level+"&ar_firstname="+ar_firstname+"&ar_lastname="+ar_lastname+"&uuid="+uuid, 
success: function(data) {
// 	alert(data);
//   if($.trim(data)=="exists"){
// $('#alerts').html("Brand name already exists");
// }else 

if($.trim(data)=="success"){
// alert("successfully added");
$("#uuid").val("");
$("#en_firstname").val(""); 
$("#en_lastname").val("");
$("#email").val("");
$("#upassword").val("");
$("#user_level").val("");
$("#ar_firstname").val("");
$("#ar_lastname").val("");
$('#error').html('<div class="alert alert-success">Item Details Saved</div>');
}else{
$('#error').html("Failure some connection issues");

}

// window.location.href='add_user.php';

$('#alerts').show();
}

});
}
}
// }
</script>

</body>
</html>
</body>
</html>