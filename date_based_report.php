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

<title>Reports</title>

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

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='select2/dist/js/select2.min.js' type='text/javascript'></script>

<!-- CSS -->
<link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <script type="text/javascript"> 
        function printDiv() { 
            var divContents = document.getElementById("rpt").innerHTML; 
            var a = window.open('', '', 'height=500, width=500'); 
            a.document.write('<html><head><title>Date Wise Report</title>'); 
           a.document.write( "<link rel='stylesheet' type='text/css' media='print' href='test.css' />" );
            a.document.write('</head><body > <h1></h1><br>'); 
            a.document.write(divContents); 
            a.document.write('</body></html>'); 
            a.document.close(); 
            setTimeout(function(){a.print();},1000)
            
        } 
    </script>
    <script type="text/javascript">
var tableToExcel = (function() {
var uri = 'data:application/vnd.ms-excel;base64,'
, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
return function(table, name) {
if (!table.nodeType) table = document.getElementById(table)
var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
window.location.href = uri + base64(format(template, ctx))
}
})()
</script> 


<!-- <script type="text/javascript"> -->
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
<div class="row box-title">
<div class="col-md-4">
<h4 >Reports</h4>
</div>
<div class="col-md-4">
</div>
<div class="col-md-4">
<h4></h4>
<button class="btn btn-primary btn-sm waves-effecton" onclick="printDiv()">Print</button>
<button class="btn btn-warning btn-sm waves-effecton" onclick="tableToExcel('example', 'alanzirentacar')">Excel</button>
</div>
 </div>

<div class="card-content">
<div class="row">
<div class="col-md-2">
<div class="form-group">
<label for="inp-type-1" class="">Report For</label>
<select id="report_for" class="form-control" name="report_for">
	<option value="">Select</option>
	<option value="invoice">Invoice</option>	
	<option value="bill">Bill</option>
	<option value="est">Estimation</option>
    <option value="vat">Invoice vat</option>
    <option value="vatr">Invoice Receipt</option>
    <option value="billv">Bill vat</option>
    <option value="billvr">BIll vat Recipt</option>
</select>

</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label for="inp-type-1" class="">Start date</label>
<input type="date" class="form-control start_date"  name="start_date" id="start_date">
</div>
</div>
<div class="col-md-4">
<div class="form-group">
<label for="inp-type-1" class="">End date</label>

<input type="date" class="form-control end_date"  name="end_date" id="end_date">

</div>
</div>
<div class="col-md-2">
	<label for="inp-type-1" class=""></label>
<p class="text-center"><button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>

</div>
</div>


<div class="row" name="rpt" id="rpt">

<div id="txtHint"></div>
</div>

</div>
		
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
<script src="assets/color-switcher/color-switcher.min.js"></script>

<!-- ------------------------------- -->


    <!-- ------------------------- -->

<script type="text/javascript">
function callResult(){
// alert("sfkmlj");
// $('#alerts').hide();

var start_date = $("#start_date").val();
var end_date = $("#end_date").val();
var reportFor = $("#report_for").val();
// var ar_description = $("#ar_description").val();
// if(userName=="" || fathername=="" ){
// alert(end_date);
// }else{
if (reportFor=='invoice') {
$.ajax({

type: "GET",
url: 'action/action_invoice_date_based_report.php',
data: "startDate="+start_date+"&endDate="+end_date, 
success: function(html) {
/*  if($.trim(data)=="exists"){
$('#alerts').html("Brand name already exists");
}else*/ 
// alert(html);
$('#txtHint').html(html);

// window.location.href='add_product.php';

$('#alerts').show();
}

});
}else if(reportFor=='bill'){

	$.ajax({

type: "GET",
url: 'action/action_bill_date_based_report.php',
data: "startDate="+start_date+"&endDate="+end_date, 
success: function(html) {
/*  if($.trim(data)=="exists"){
$('#alerts').html("Brand name already exists");
}else*/ 
// alert(html);
$('#txtHint').html(html);

// window.location.href='add_product.php';

$('#alerts').show();
}

});

}
else if (reportFor=='est'){
	$.ajax({

type: "GET",
url: 'action/action_estimation_date_based_report.php',
data: "startDate="+start_date+"&endDate="+end_date, 
success: function(html) {
/*  if($.trim(data)=="exists"){
$('#alerts').html("Brand name already exists");
}else*/ 
// alert(html);
$('#txtHint').html(html);

// window.location.href='add_product.php';

$('#alerts').show();
}

});
}else if (reportFor=='vat') {
    $.ajax({

type: "GET",
url: 'action/action_vat_date_based_report.php',
data: "startDate="+start_date+"&endDate="+end_date, 
success: function(html) {

// alert(html);
$('#txtHint').html(html);

// window.location.href='add_product.php';

$('#alerts').show();
}

});
}else if (reportFor=='vatr') {
     $.ajax({

type: "GET",
url: 'action/action_receipt_date_based_report.php',
data: "startDate="+start_date+"&endDate="+end_date, 
success: function(html) {

// alert(html);
$('#txtHint').html(html);

// window.location.href='add_product.php';

$('#alerts').show();
}

});

}else if (reportFor=='billv') {
     $.ajax({

type: "GET",
url: 'action/action_bill_vat_date_based_report.php',
data: "startDate="+start_date+"&endDate="+end_date, 
success: function(html) {

// alert(html);
$('#txtHint').html(html);

// window.location.href='add_product.php';

$('#alerts').show();
}

});

}else if (reportFor=='billvr') {
     $.ajax({

type: "GET",
url: 'action/action_bill_vat_recipt_date_based_report.php',
data: "startDate="+start_date+"&endDate="+end_date, 
success: function(html) {

// alert(html);
$('#txtHint').html(html);

// window.location.href='add_product.php';

$('#alerts').show();
}

});

}
}
// }
</script>
</body>
</html>
