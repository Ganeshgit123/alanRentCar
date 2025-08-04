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
<script type="text/javascript">
var count = 1;
</script>
</head>

<body>
<?php 
include 'side_header.php';
include 'top_header.php';

$sid = $_GET["id"];
// $invoice_id =17; 
$listus = listContractById($sid);
foreach ($listus as $cval) {
?>
<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<!-- /.col-lg-6 col-xs-12 -->   
<!-- /.col-xs-12 -->

<form class="form-horizontal" id="insert_form">
<div class="box-content card white">
<h4 class="box-title">Contract</h4>
<div class="card-content">

<div class="col-lg-6 col-xs-12">

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Project Name</label>
<div class="col-sm-9">
<input class="form-control project_name" type="text" name="project_name" placeholder="Project Name" value="<?php echo $cval['project_name']?>">
<input type="hidden" required class="form-control" name="id" 
       id="id" placeholder="sample Name" value="<?php echo $sid; ?>">
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Domain Name</label>
<div class="col-sm-9">
<input class="form-control domain_name" type="text" name="domain_name" placeholder="Domain Name" value="<?php echo $cval['domain_name']?>">
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Service Provider</label>
<div class="col-sm-9">
<input class="form-control service_provider" type="text" name="service_provider" value="<?php echo $cval['service_provider']?>">
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Project Details</label>
<div class="col-sm-9">
<textarea class="form-control project_details" id="project_details" name="project_details"><?php echo $cval['project_details']?></textarea>
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Fees Details(Add (comma ,)for next point)</label>
<div class="col-sm-9">
<textarea class="form-control fees_details" id="fees_details" name="fees_details"><?php echo $cval['fees_details']?></textarea>
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Project Deliverable(Add (comma ,)for next point)</label>
<div class="col-sm-9">
<textarea class="form-control project_deliverable" id="project_deliverable" name="project_deliverable"><?php echo $cval['project_deliverable']?></textarea>
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Issue date / <span class="arabic">تاريخ الإنشاء</span></label>
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control issue_date" placeholder="mm/dd/yyyy" name="issue_date" id="datepicker-autoclose" value="<?php echo $cval['issue_date']?>">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div>
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Project Total Timeline</label>
<div class="col-sm-9">
<input class="form-control project_timeline" type="text" name="project_timeline" value="<?php echo $cval['project_timeline']?>">
</div>
</div>
</div>

<div class="col-lg-6 col-xs-12">
<!-- /.right columns -->
  <div clss='row'>

<div class="form-group">
<div class="col-sm-9">
<input class="form-control ar_project_name arabic" type="text" name="ar_project_name" placeholder="اسم المشروع" value="<?php echo $cval['ar_project_name']?>">
</div>
<label for="inp-type-1" class="col-sm-3 control-label arabic">اسم المشروع</label>
</div>

<div class="form-group">
<div class="col-sm-9">
<input class="form-control ar_domain_name arabic" type="text" name="ar_domain_name" placeholder="اسم النطاق" value="<?php echo $cval['ar_domain_name']?>">
</div>
<label for="inp-type-1" class="col-sm-3 control-label arabic">اسم النطاق</label>
</div>

<div class="form-group">
<div class="col-sm-9">
<input class="form-control ar_service_provider arabic" type="text" name="ar_service_provider" placeholder="مقدم الخدمة" value="<?php echo $cval['ar_service_provider']?>">
</div>
<label for="inp-type-1" class="col-sm-3 control-label arabic">مقدم الخدمة</label>
</div>

<div class="form-group">
<div class="col-sm-9">
<textarea class="form-control arabic" id="ar_project_details" name="ar_project_details"><?php echo $cval['ar_project_details']?></textarea>
</div>
<label for="inp-type-1" class="col-sm-3 control-label arabic">تفاصيل المشروع</label>
</div>

<div class="form-group">
<div class="col-sm-9">
<textarea class="form-control arabic" id="ar_fees_details" name="ar_fees_details"><?php echo $cval['ar_fees_details']?></textarea>
</div>
<label for="inp-type-1" class="arabic">تفاصيل الرسوم (إضافة (فاصلة) للنقطة التالية)</label>
</div>
<br>
<div class="form-group">
<div class="col-sm-9">
<textarea class="form-control arabic" id="ar_project_deliverable" name="ar_project_deliverable"><?php echo $cval['ar_project_deliverable']?></textarea>
</div>
<label for="inp-type-1" class="arabic">تسليم المشروع (إضافة (فاصلة) للنقطة التالية)</label>
</div>
<br>
<div class="form-group">
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control star_date" placeholder="mm/dd/yyyy" name="star_date" id="datepicker-autoclose" value="<?php echo $cval['star_date']?>">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div>
</div>
<label for="inp-type-1" class="col-sm-3 control-label">Start date / <span class="arabic">تاريخ البدء</span></label>
</div>


<div class="form-group">
<div class="col-sm-9">
<input class="form-control ar_project_timeline arabic" type="text" name="ar_project_timeline" value="<?php echo $cval['ar_project_timeline']?>">
</div>
<label for="inp-type-1" class="col-sm-3 control-label arabic">الجدول الزمني الإجمالي للمشروع</label>
</div>

</div>

</div>

</div>

</div>

<div class="table-responsive">
<span id="error"></span>

<table class="table table-bordered" id="crud_table">
<thead>
<tr>
<th>S.No / <span class="arabic_no_right">الرقم التسلسلي</span></th>
<th>Timeline(EN)</th>
<th class="arabic_no_right">الجدول الزمني</th>
<th>Days</th>
<th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
</tr>
</thead>
<tbody>
  <?php 

// $invoice_id =17; 
$wval = listContractDetailsById($sid);
foreach ($wval as $dval) {
$count = $count + 1;
?>  
<tr>
<td  width="100"><input type="text" class="form-control s_no " name="s_no[]" id="s_no_<?php echo $count; ?>" value="<?php echo $count; ?>"/></td>

<td  width="200" ><input type="text" id="en_timeline_desc<?php echo $count; ?>"  name="en_timeline_desc[]" class="form-control en_timeline_desc" value="<?php echo $dval['en_timeline_desc'];?>" /></td>

<td  width="200" ><input type="text" id="ar_timeline_desc<?php echo $count; ?>"  name="ar_timeline_desc[]" class="form-control ar_timeline_desc" value="<?php echo $dval['ar_timeline_desc'];?>" /></td>

<td  width="200" ><input type="text" id="days<?php echo $count; ?>"  name="days[]" class="form-control days" value="<?php echo $dval['days'];?>" /></td>

<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>
</tr>
<script>
count="<?php echo $count; ?>";
</script>
<?php } ?>
</tbody>
</table>

<div align="center">
<input type="submit" name="submit" class="btn btn-info" value="submit"/>
</div>
</div>  
<?php }?>
</form>
  
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

$(document).on('click', '.add', function(){
count++;
var html = '';
// alert(count);
// textbox3.value = answer;
html += '<tr>';
html += '<td  width="30"><input type="text" readonly class="form-control s_no " name="s_no[]" id="s_no_'+count+'" value="'+count+'"/></td>';

html += '<td  width="200" ><input type="text" id="en_timeline_desc_'+count+'"  name="en_timeline_desc[]" class="form-control en_timeline_desc" /></td>';

html += '<td  width="200" ><input type="text" id="ar_timeline_desc_'+count+'"  name="ar_timeline_desc[]" class="form-control ar_timeline_desc" /></td>';

html += '<td  width="200" ><input type="text" id="days_'+count+'"  name="days[]" class="form-control days" /></td>';

html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
$('tbody').append(html);
});

$(document).on('click', '.remove', function(){
$(this).closest('tr').remove();
});


$('#insert_form').on('submit', function(event){
event.preventDefault();
var error = '';

$('.project_name').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Project Name</p>';
return false;
}

});  
$('.domain_name').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Domain Name</p>';
return false;
}

});   

$('.project_details').each(function(){

if($(this).val() == '')
{
// alert($(this).val());
error += '<p>Enter Project Details</p>';
return false;
}

});     

$('.issue_date').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Issue Date</p>';
return false;
}

}); 

$('.project_timeline').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Project Timeline</p>';
return false;
}

}); 


$('.sno').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});

$('.en_timeline_desc').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Timeline Description at '+count+' Row</p>';
return false;
}
count = count + 1;
});

$('.ar_timeline_desc').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Arabic Timeline Description at '+count+' Row</p>';
return false;
}
count = count + 1;
});

$('.days').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Days at '+count+' Row</p>';
return false;
}
count = count + 1;
});
 
var form_data = $(this).serialize();

if(error == '')
{

$.ajax({
url:"action/action_update_contract.php",
method:"POST",
data:form_data,
success:function(data)
{
  // alert(data);
if(data != ''){

window.location.href = 'contract_design.php?contract_id='+data;

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

