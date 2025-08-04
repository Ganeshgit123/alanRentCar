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

<title>Product Update</title>

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
    <div class='col-md-4'><h4>Edit Product</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        <a href='product_list.php'><button class="btn btn-warning">Product list</button></a>
    </div>
</div>

 <?php              
      require_once 'process/dao.php';    
        $sid=$_GET["id"];
        $listus= listProductsById($sid);
         ?>
         <?php $count=0;
            foreach ($listus as $cval) { ?>

<div class="card-content">
  <div class="row"><span id="error"></span></div>
<div class="row">
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Product Name<span class="required">*</span></label>
<input type="text" class="form-control" id="en_pname" placeholder="Product name" name="en_pname"  value="<?php echo $cval['en_pname']?>">
<input type="hidden" required class="form-control" name="id" 
       id="id" placeholder="sample Name" value="<?php echo $sid ?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1">Product Description<span class="required">*</span></label>
<textarea class="form-control" id="en_description" name="en_description" placeholder="Product description" ><?php echo $cval['en_description']?></textarea>
</div>
		</div>
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>اسم المنتج</label>
<input type="text" class="form-control arabic" id="ar_pname" placeholder="اسم المنتج" name="ar_pname" value="<?php echo $cval['ar_pname']?>">
</div>
<div class="form-group">
<label for="exampleInputEmail1" class="arabic"><span class="required">*</span>وصف المنتج</label>
<textarea class="form-control arabic" id="ar_description" name="ar_description" placeholder="وصف المنتج" ><?php echo $cval['ar_description']?></textarea>
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
//alert("sfkmlj");
$('#alerts').hide();
var id = $("#id").val();
var en_pname = $("#en_pname").val();
var en_description = $("#en_description").val();
var ar_pname = $("#ar_pname").val();
var ar_description = $("#ar_description").val();
if (en_pname=='' || en_description=='' || ar_pname=='' ||
  ar_description==''  ) {
  error='enter all fields';
    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }else{
$.ajax({

type: "GET",
url: 'action/action_update_product.php',
data: "id="+id+"&en_pname="+en_pname+"&en_description="+en_description+"&ar_pname="+ar_pname+"&ar_description="+ar_description, 
success: function(data) {
  // alert(html);
/*  if($.trim(data)=="exists"){
$('#alerts').html("Brand name already exists");
}else*/ 


window.location.href='product_list.php';

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