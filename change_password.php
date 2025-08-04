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

<title>Change Password</title>

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
     


<div class="card-content">
	<div class="row"><span id="error"></span></div>
	
<div class="row">
		<div class="col-md-4">
<div class="box-content card white" style="padding: 20px;">
<div class="form-group">
<label for="exampleInputPassword1">New Password<span class="required">*</span></label>
<input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="New Password"  required=""
oninvalid="this.setCustomValidity('Please enter Valid password')" oninput="setCustomValidity('')">
</div>

<div class="form-group">
<label for="exampleInputPassword1">Confirm Password<span class="required">*</span></label>
<input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password"  required=""
oninvalid="this.setCustomValidity('Please enter Valid password')" oninput="setCustomValidity('')">
</div>

<p class="text-center"><button type="submit" id="submit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>

</div>

		</div>

		<div class="col-md-8"></div>
</div>


</div>

<!-- /.row small-spacing -->		
<?php include 'footer.php'; ?>
</div>
<!-- /.main-content -->


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

var newpassword = $("#newpassword").val();
var confirmpassword = $("#confirm_password").val();

// var id = $_SESSION["user"];
// alert(newpassword);
// alert(confirmpassword);

// if(userName=="" || fathername=="" ){
// alert("Enter all the Fields");
// }else{
	var error=''
	if (newpassword=='' ||confirmpassword=='' ) {
		error='Enter all fields';
		$('#error').html('<div class="alert alert-danger">'+error+'</div>');
	}else if(newpassword != confirmpassword){
         error='Password and confirm password does not match';
		$('#error').html('<div class="alert alert-danger">'+error+'</div>');
	}
	else{
$.ajax({

type: "POST",
url: 'action/action_change_password.php',
data: "newpassword="+newpassword, 
success: function(data) {
	// alert(data);
//   if($.trim(data)=="exists"){
// $('#alerts').html("Brand name already exists");
// }else 

if($.trim(data)!=""){
// alert("successfully added");
$("#newpassword").val("");
$("#confirm_password").val(""); 
$('#error').html('<div class="alert alert-success">Password Updated Successfully</div>');
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