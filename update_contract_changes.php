<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
} 
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="assets/images/favicon.ico">

<title>Contract Changes Update</title>

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
<form class="form-horizontal" id="insert_form">
  <div class="box-content card white">
<div class="box-title row">
    <div class='col-md-4'><h4>Edit Contract Changes</h4></div>
    <div class='col-md-4'></div>
    <div class='col-md-4'> 
        <a href='add_changes_on_contract.php'><button class="btn btn-warning">Changed Contract List</button></a>
    </div>
</div>

 <?php              
      require_once 'process/dao.php';    
        $sid=$_GET["id"];
        $listus= listContractChangesById($sid);
         ?>
         <?php $count=0;
            foreach ($listus as $cval) { ?>

<div class="card-content">
  <div class="row"><span id="error"></span></div>
<div class="row">
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Project Name<span class="required">*</span></label>
<textarea class="form-control" id="project_name" name="project_name"><?php echo $cval['project_name']?></textarea>
<input type="hidden" required class="form-control" name="id" 
       id="id" placeholder="Project Name" value="<?php echo $sid ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Changes on Contract(Add (comma ,)for next point)<span class="required">*</span></label>
<textarea class="form-control" id="contract_changes" name="contract_changes"><?php echo $cval['contract_changes']?></textarea>
</div>
		</div>
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>اسم المشروع</label>
<textarea class="form-control arabic" id="ar_project_name" name="ar_project_name" placeholder="اسم المشروع" ><?php echo $cval['ar_project_name']?></textarea>
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>التغييرات في العقد (إضافة (فاصلة) للنقطة التالية)</label>
<textarea class="form-control arabic" id="ar_contract_changes" name="ar_contract_changes"><?php echo $cval['ar_contract_changes']?></textarea>
</div>
</div>
</div>
<?php }?>
<span id="error"></span>

<div align="center">
<input type="submit" name="submit" class="btn btn-info" value="submit"   />
</div>
</div>

</form>
<?php include 'footer.php'; ?>
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
url:"action/action_update_changes_contract.php",
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

