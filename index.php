<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<link rel="icon" href="assets/images/favicon.ico">

<title>Login</title>
<link rel="stylesheet" href="assets/styles/style.min.css">

<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

</head>

<body>

<div id="single-wrapper">
<form action="#" class="frm-single">
<div class="inside">
	<img src="assets/images/logo.png" alt="">
<div class="title"><strong>Admin</strong></div>
<!-- /.title -->
<div class="frm-title">Login</div>
<!-- /.frm-title -->
<div class="frm-input"><input type="text" id="uname" placeholder="Username" class="frm-inp"><i class="fa fa-user frm-ico"></i></div>
<!-- /.frm-input -->
<div class="frm-input"><input type="password" id="pswd" placeholder="Password" class="frm-inp"><i class="fa fa-lock frm-ico"></i></div>

<!-- /.clearfix -->
<button type="button" onclick="callResult()" class="frm-submit">Login<i class="fa fa-arrow-circle-right"></i></button>



<!-- /.row -->
<a href="#" class="a-link"><i class="fa fa-key"></i>alanzirentacar</a>
<div class="frm-footer">alanazirentacar © 2025</div>
<!-- /.footer -->
</div>
<!-- .inside -->
</form>
<!-- /.frm-single -->
</div><!--/#single-wrapper -->

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
<script src="assets/plugin/nprogress/nprogress.js"></script>
<script src="assets/plugin/waves/waves.min.js"></script>

<script src="assets/scripts/main.min.js"></script>

<script type="text/javascript">
function callResult()
{
	// alert("sdkjk");
var username=$('#uname').val();
var password=$('#pswd').val();

if(username=="" || password=="" ){
alert("Enter all the Fields");
}else{

$.ajax({

type: "GET",
url: 'action/action_login.php',
data: "username="+username+"&password="+password,
success: function(data) {
// alert(data);
if($.trim(data)=="failure"){
alert("Username and Password Incorrect");
}
else if($.trim(data)=="success"){
document.location.href="dashboard.php";
}
else{
alert("Failure some connection issues");
} } });
}}

document.getElementById('pswd').addEventListener('keypress', function(event) {
if (event.keyCode == 13) {
callResult();
}
});
</script>
</body>
</html>