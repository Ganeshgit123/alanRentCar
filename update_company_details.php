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

<title>alanzirentacar</title>

<link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">

<!-- DateRangepicker -->
<link rel="stylesheet" href="assets/plugin/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/styles/style.min.css">

<!-- Material Design Icon -->
<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="assets/styles/table.css">

</head>

<body>
<?php include 'side_header.php'; ?>
<!-- /.main-menu -->
<?php include 'top_header.php' ; ?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<!-- /.col-lg-6 col-xs-12 -->		
<!-- /.col-xs-12 -->
<div class="box-content card white">
<h4 class="box-title">Company Details</h4>
 
  <?php              
      require_once 'process/dao.php';    
        $sid=$_GET["id"];
        $listus= listCompanyById($sid);
        // print_r($listus);  
         ?>
     <?php $count=0;
            foreach ($listus as $cval) { ?> 


<div class="card-content">
<div class="row">
  <span id="error"></span>
</div>
<div class="row">
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Name<span class="required">*</span> </label>
<input type="text" class="form-control" id="en_name" placeholder="Name" name="en_name" 
value="<?php echo $cval['en_name']?>">
<input type="hidden" required class="form-control" name="id" 
       id="id" placeholder="sample Name" value="<?php echo $sid ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Phone Number<span class="required">*</span></label>
<input type="text" class="form-control" id="en_phone_no" name="en_phone_no" placeholder="Phone No" 
 value="<?php echo $cval['en_phone_no']?>">
</div>
<div class="form-group">
<label for="example">Address<span class="required">*</span>  (Add (comma ,)for next line)</label>
<textarea class="form-control" id="en_address" name="en_address" placeholder="Write your address"> <?php echo $cval['en_address']?></textarea>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Email Address<span class="required">*</span></label>
<input type="email" class="form-control" id="email" name="email" placeholder="Email Id" value="<?php echo $cval['email']?>">
</div>
<div class="form-group">
<label for="example">Bank Details<span class="required">*</span> (Add (comma ,)for next line)</label>
<textarea class="form-control" id="en_bank_details" placeholder="Bank Details" name="en_bank_details" ><?php echo $cval['en_bank_details']?></textarea> 
</div>
<div class="form-group">
<label for="exampleInputEmail1">VAT<span class="required">*</span></label>
<input type="text" class="form-control" id="en_vat" placeholder="Vat" name="en_vat"  
 value="<?php echo $cval['en_vat']?>">
</div>
<!-- <div class="form-group">
<label for="exampleInputEmail1">Tax<span class="required">*</span> </label>
<input type="text" class="form-control" id="en_tax" placeholder="Tax" name="en_tax" 
 value="<?php echo $cval['en_tax']?>">
</div> -->
		</div>
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>سم</label>
<input type="text" class="form-control arabic" id="ar_name" placeholder="سم" name="ar_name"  value="<?php echo $cval['ar_name']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>رقم الجوال</label>
<input type="text" class="form-control arabic" id="ar_phone_no" name="ar_phone_no" placeholder="رقم الجوال"  value="<?php echo $cval['ar_phone_no']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>( أضف فاصلة للسطر الثاني )العنوان</label>
<textarea class="form-control arabic" id="ar_address" name="ar_address" placeholder="العنوان" ><?php echo $cval['ar_address']?></textarea>
</div>

</div>
</div>
</div>

<p class="text-center"><button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>
</div>


<?php }?>



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
var en_name = $("#en_name").val();
var ar_name = $("#ar_name").val();
var en_phone_no = $("#en_phone_no").val();
var ar_phone_no = $("#ar_phone_no").val();
var en_address = $("#en_address").val();
var ar_address = $("#ar_address").val();
var email = $("#email").val();
var en_bank_details = $("#en_bank_details").val();
var en_vat = $("#en_vat").val();
// var en_tax = $("#en_tax").val();

if (en_name =='' || ar_name =='' || en_phone_no =='' ||
  en_phone_no =='' || ar_phone_no =='' || en_address =='' || ar_address =='' || email == '' || en_bank_details == '' || en_vat == '') {
	error='Enter all fields';
		$('#error').html('<div class="alert alert-danger">'+error+'</div>');
	}else{
$.ajax({

type: "GET",
url: 'action/action_update_company_details.php',
data: "id="+id+"&en_name="+en_name+"&ar_name="+ar_name+"&en_phone_no="+en_phone_no+"&ar_phone_no="+ar_phone_no+"&en_address="+en_address+"&ar_address="+ar_address+"&email="+email+"&en_bank_details="+en_bank_details+"&en_vat="+en_vat,
success: function(data) {
  // alert(data)
  if (data==1) {

    $('#error').html('<div class="alert alert-success">Company Details Updated</div>');
  }
	// alert(data);
// window.location.href='update_company_details.php?id=1';
// $('#alerts').show();
}

});
}
  }
</script>
</body>
</html>