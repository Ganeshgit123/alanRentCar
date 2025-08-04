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

<title>Update_Client</title>

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
<h4 class="box-title">Edit Client</h4>
 
  <?php              
      require_once 'process/dao.php';    
        $sid=$_GET["id"];
        $listus= listClientsById($sid);
         ?>
         <?php $count=0;
            foreach ($listus as $cval) { ?>

<div class="card-content">
  <div class="row"><span id="error"></span></div>
<div class="row">
  
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">First Name (EN)<span class="required">*</span></label>
<input type="text" class="form-control" id="en_firstname" placeholder="First name" name="en_firstname"  value="<?php echo $cval['en_firstname']?>">
<input type="hidden" required class="form-control" name="id" 
       id="id" placeholder="sample Name" value="<?php echo $sid; ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Last Name (EN)<span class="required">*</span></label>
<input type="text" class="form-control" id="en_lastname" placeholder="Last name" name="en_lastname" pattern="[a-zA-Z. ]{1,}"  value="<?php echo $cval['en_lastname']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Company Name (EN)<span class="required">*</span></label>
<input type="text" class="form-control" id="en_com_name" placeholder="company name" name="en_com_name" value="<?php echo $cval['en_com_name']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email address<span class="required">*</span></label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email Id"  value="<?php echo $cval['email']?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Phone Number (EN)<span class="required">*</span></label>
<input type="number" class="form-control" id="en_phone_no" name="en_phone_no" placeholder="Phone No"  value="<?php echo $cval['en_phone_no']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Land Line (EN)</label>
<input type="number" class="form-control" id="en_landline" name="land" placeholder="Land-line No" value="<?php echo $cval['en_landline']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Address (EN)<span class="required">*</span></label>
<textarea class="form-control" id="en_address" name="en_address" placeholder="Write your address"><?php echo $cval['en_address']?></textarea>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Tax No.<span class="required">*</span></label>
<input type="text" class="form-control" id="tax_no" placeholder="Tax No" name="tax_no" value="<?php echo $cval['tax_no']?>">
</div>
		</div>
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>الإسم الاول</label>
<input type="text" class="form-control arabic" id="ar_firstname" placeholder="الإسم الاول" name="ar_firstname"  value="<?php echo $cval['ar_firstname']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>الإسم الأخير</label>
<input type="text" class="form-control arabic" id="ar_lastname" placeholder="الإسم الأخير" name="ar_lastname"  value="<?php echo $cval['ar_lastname']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>اسم الشركة</label>
<input type="text" class="form-control arabic" id="ar_com_name" placeholder="اسم الشركة" name="ar_com_name" value="<?php echo $cval['ar_com_name']?>">
</div>
<div class="spa"></div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>رقم الجوال</label>
<input type="text" class="form-control arabic" id="ar_phone_no" name="ar_phone_no" placeholder="رقم الجوال"  value="<?php echo $cval['ar_phone_no']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic">رقم الهاتف</label>
<input type="text" class="form-control arabic" id="ar_landline" name="ar_landline" placeholder="رقم الهاتف" value="<?php echo $cval['ar_landline']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>العنوان</label>
<textarea class="form-control arabic" id="ar_address" name="ar_address"placeholder="العنوان"><?php echo $cval['ar_address']?></textarea>
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
var en_firstname = $("#en_firstname").val();
var en_lastname = $("#en_lastname").val();
var en_com_name = $("#en_com_name").val();
var ar_firstname = $("#ar_firstname").val();
var ar_lastname = $("#ar_lastname").val();
var ar_com_name = $("#ar_com_name").val();
var en_phone_no = $("#en_phone_no").val();
var en_landline = $("#en_landline").val();
var en_address = $("#en_address").val();
var ar_phone_no = $("#ar_phone_no").val();
var ar_landline = $("#ar_landline").val();
var ar_address = $("#ar_address").val();
var email = $("#email").val();
var tax_no = $("#tax_no").val();
// alert (tax_no);
if (en_firstname=='' || en_lastname=='' || en_com_name=='' ||
  email=='' || en_phone_no=='' || en_address=='' || ar_firstname=='' || ar_lastname== '' || ar_com_name=='' || ar_phone_no=='' || ar_address=='' ) {
  error='enter all  fields';
    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }else{
$.ajax({

type: "GET",
url: 'action/action_update_client.php',
data: "id="+id+"&en_firstname="+en_firstname+"&en_lastname="+en_lastname+"&ar_firstname="+ar_firstname+"&ar_lastname="+ar_lastname+"&en_phone_no="+en_phone_no+"&en_landline="+en_landline+"&en_address="+en_address+"&ar_phone_no="+ar_phone_no+"&ar_landline="+ar_landline+"&ar_address="+ar_address+"&email="+email+"&en_com_name="+en_com_name+"&ar_com_name="+ar_com_name+"&tax_no="+tax_no, 
success: function(data) {
	// alert(html);
  if (data==1) {
    window.location.href='client_list.php';
  }else{
    alert("Failure ")
  }

$('#alerts').show();
}

});
}
}
// }
</script>

</body>
</html>