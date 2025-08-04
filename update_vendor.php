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

<title>Vendor Update</title>

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
<div class="box-title row">
    <div class='col-md-4'><h4>Edit Vendor</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        <a href='vendor_list.php'><button class="btn btn-warning">vendor list</button></a>
    </div>
</div><div class="box-content card white">

 
  <?php              
      require_once 'process/dao.php';    
        $sid=$_GET["id"];
        $listus= listVendorsById($sid);
         ?>
         <?php $count=0;
            foreach ($listus as $cval) { ?>


<div class="card-content">
   <div class="row"><span id="error"></span></div>
<div class="row">
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Vendor Name<span class="required">*</span></label>
<input type="text" class="form-control" id="en_vname" placeholder="vendor name" name="en_vname"  value="<?php echo $cval['en_vname']?>">
<input type="hidden" required class="form-control" name="id" 
       id="id" placeholder="sample Name" value="<?php echo $sid ?>">
</div>

<div class="form-group"> 
<label for="exampleInputEmail1">Company Name<span class="required">*</span></label>
<input type="text" class="form-control" id="en_company_name" name="en_company_name" placeholder="Enter Company Name" value="<?php echo $cval['en_company_name']?>"> 
</div>
<div class="form-group">
<label for="exampleInputEmail1">Vendor Address<span class="required">*</span> (Add (comma ,)for next line)</label>
<textarea class="form-control" id="en_address" name="en_address"placeholder="vendor address" required=""
oninvalid="this.setCustomValidity('Please enter Vendor Address')" oninput="setCustomValidity('')"><?php echo $cval['en_address']?></textarea>
</div>

<!-- <div class="form-group">
<label for="exampleInputEmail1">Contact Person</label>
<input type="text" class="form-control" id="en_contact_person" name="en_contact_person" placeholder="Enter contact person" required=""
oninvalid="this.setCustomValidity('Please enter Contact Person')" oninput="setCustomValidity('')" value="<?php echo $cval['en_contact_person']?>">
</div> -->

<div class="form-group">
<label for="exampleInputEmail1">Phone No<span class="required">*</span></label>
<input type="text" class="form-control" id="en_phone" name="en_phone" placeholder="Enter Phone" value="<?php echo $cval['en_phone']?>">
</div>


<div class="form-group">
<label for="exampleInputEmail1">Email<span class="required">*</span></label>
<input type="text" class="form-control" id="en_email" name="en_email" placeholder="Enter Email" value="<?php echo $cval['en_email']?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1">VAT Number<span class="required">*</span></label>
<input type="text" class="form-control" id="vat_id" name="vat_id" placeholder="Enter your VAT Id" value="<?php echo $cval['vat_id']?>">
</div>
		</div>
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>اسم البائع</label>
<input type="text" class="form-control arabic" id="ar_vname" placeholder="اسم البائع" name="ar_vname" value="<?php echo $cval['ar_vname']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>إسم الشركة</label>
<input type="text" class="form-control arabic" id="ar_company_name" name="ar_company_name" placeholder="الشخص الذي يمكن الاتصال به" value="<?php echo $cval['ar_company_name']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span> ( أضف فاصلة للسطر الثاني )عنوان البائع</label>
<textarea class="form-control arabic" id="ar_address" name="ar_address" placeholder="عنوان البائع" ><?php echo $cval['ar_address']?></textarea>
</div>

<!-- <div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>الشخص الذي يمكن الاتصال به</label>
<input type="text" class="form-control arabic" id="ar_contact_person" name="ar_contact_person" placeholder="الشخص الذي يمكن الاتصال به" value="<?php echo $cval['ar_contact_person']?>">
</div> -->

<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>رقم الجوال</label>
<input type="text" class="form-control arabic" id="ar_phone" name="ar_phone" placeholder="الشخص الذي يمكن الاتصال به" value="<?php echo $cval['ar_phone']?>">
</div>



</div>
</div>
<?php }?>
<p class="text-center"><button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>
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
<script src="assets/color-switcher/color-switcher.min.js"></script>

<script src="assets/scripts/export.js"></script>

<script type="text/javascript">
function callResult(){
// alert("sfkmlj");
$('#alerts').hide();
var id = $("#id").val();
var en_vname = $("#en_vname").val();
var en_address = $("#en_address").val();
var en_contact_person = $("#en_contact_person").val();
var vat_id = $("#vat_id").val();
var ar_vname = $("#ar_vname").val();
var ar_address = $("#ar_address").val();
var ar_contact_person = $("#ar_contact_person").val();
var en_phone = $("#en_phone").val();
var en_email = $("#en_email").val();
var en_company_name = $("#en_company_name").val();
var ar_phone = $("#ar_phone").val();
var ar_company_name = $("#ar_company_name").val();
if (en_vname=='' || en_address=='' || en_company_name=='' ||
  vat_id=='' || ar_vname=='' || ar_address=='' || en_email=='' || ar_company_name== '' ) {
  error='Enter all fields';
    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }else{
    $.ajax({

type: "GET",
url: 'action/action_update_vendor.php',
data: "id="+id+"&en_vname="+en_vname+"&en_address="+en_address+"&vat_id="+vat_id+"&ar_vname="+ar_vname+"&ar_address="+ar_address+"&en_phone="+en_phone+"&en_email="+en_email+"&en_company_name="+en_company_name+"&ar_phone="+ar_phone+"&ar_company_name="+ar_company_name, 
success: function(data) {
 // alert(data);
window.location.href='vendor_list.php';
$('#alerts').show();
}

});
  }
}
</script>
</body>
</html>