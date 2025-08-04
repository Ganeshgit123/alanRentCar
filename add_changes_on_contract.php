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

<title>Alanzirentacar</title>

<link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">

<!-- DateRangepicker -->
<link rel="stylesheet" href="assets/plugin/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/styles/style.min.css">

<!-- Material Design Icon -->
<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='select2/dist/js/select2.min.js' type='text/javascript'></script>

<!-- CSS -->
<link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>

<body>
<?php 
include 'side_header.php';
include 'top_header.php';
?>
<!-- /.main-menu -->

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<!-- /.col-lg-6 col-xs-12 -->   
<!-- /.col-xs-12 -->

<form class="form-horizontal" id="insert_form">
<div class="box-content card white">
<h4 class="box-title">Changes on Contract</h4>
<div class="card-content">

<div class="col-lg-5 col-xs-12">

<div class="form-group">
<label for="exampleInputEmail1">Project Name</label>
<textarea class="form-control" id="project_name" name="project_name"></textarea>
</div>

<div class="form-group">
<label for="exampleInputEmail1">Changes on Contract(Add (comma ,)for next point)</label>
<textarea class="form-control" id="contract_changes" name="contract_changes"></textarea>
</div>

</div>
<div class="col-lg-2 col-xs-12"></div>
<div class="col-lg-5 col-xs-12">


<div class="form-group">
<label for="exampleInputEmail1" class="arabic">اسم المشروع</label>
<textarea class="form-control arabic" id="ar_project_name" name="ar_project_name"></textarea>
</div>

<div class="form-group">
<label for="exampleInputEmail1" class="arabic">التغييرات في العقد (إضافة (فاصلة) للنقطة التالية)</label>
<textarea class="form-control arabic" id="ar_contract_changes" name="ar_contract_changes"></textarea>
</div>

</div>

</div>

<span id="error"></span>

<div align="center">
<input type="submit" name="submit" class="btn btn-info" value="submit"   />
</div>
<!--  below div whitebox end div -->
</div>

</form>
<!-- /.card-content -->

<!-- /.row -->

<!-- /.row small-spacing -->    
<?php include 'footer.php'; ?>
</div>
</div>
<!-- /.main-content -->
</div>

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
<script src="assets/color-switcher/color-switcher.min.js"></script>

</body>
</html>
</body>
</html>
<script>

$(document).ready(function(){
  // alert("sjs");


$('#insert_form').on('submit', function(event){
event.preventDefault();
var error = '';


$('#project_name').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Project Name</p>';
return false;
}

}); 

$('#contract_changes').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Changes on Contract</p>';
return false;
}

});

$('#ar_project_name').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Project Name</p>';
return false;
}

});

$('#ar_contract_changes').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Changes on Contract</p>';
return false;
}

});

 
var form_data = $(this).serialize();

if(error == '')
{

$.ajax({
url:"action/action_insert_contract_changes.php",
method:"POST",
data:form_data,
success:function(data)
{
  // alert(data);
if(data != ''){
   window.open('contract_changes_print.php?id='+data);
   window.location.href='contract_changed_list.php';
//window.location.href = 'print_sidebar_invoice.php?invoice_id='+data;

$('#item_table').find('tr:gt(0)').remove();
$('#error').html('<div class="alert alert-success">Item Details Saved</div>');
}
}
});

}

else
{

$('#error').html('<div class="alert alert-danger">'+error+'</div>');
}

});

});

</script>

