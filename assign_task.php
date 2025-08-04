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

<title>Assign Task</title>

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
    <div class='col-md-4'><h4>Assign Task</h4></div>
    <div class='col-md-6'></div>
    <div class='col-md-2'> 
        <a href='pending_task_list.php'><button class="btn btn-warning">Task list</button></a>
    </div>
</div>

 

<div class="card-content">
  <form id="form" method="post" action="action/action_assign_task.php" enctype="multipart/form-data">

	<div class="row"><span id="error"></span></div>
<div class="row">
		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Task Assign To <span class="required">*</span></label>
<select class="form-control assigned_to" name="assigned_to" id="assigned_to">
<option value="0">Select</option>
                   <?php  
                   require_once 'process/dao.php';
                     $arr= listUsers();      
                    foreach ($arr as $value) {
                     ?>
                  <option value="<?php echo $value['id']; ?>"><?php echo $value['en_firstname']?> <?php echo $value['en_lastname']?></option>
                    <?php } ?>

   </select>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Task Title<span class="required">*</span></label>
<input type="text" class="form-control" id="task_title" name="task_title" placeholder="Title of the Task" name="task_title">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Task Description<span class="required">*</span></label>
<textarea class="form-control" id="task_description" name="task_description" placeholder="Description of the task"></textarea>
</div>
		</div>
		<div class="col-md-6">


<div class="form-group">
<label for="exampleInputEmail1">Start Date<span class="required">*</span></label>
<div class="input-group">
<input type="text" class="form-control start_date" name="start_date" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div> 
</div>
<div class="form-group">
<label for="exampleInputEmail1">End Date<span class="required">*</span></label>
<div class="input-group">
<input type="text" class="form-control end_date" name="end_date" placeholder="mm/dd/yyyy" id="datepicker">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div> 
</div>
<div class="form-group">
<label for="exampleInputEmail1">Upload Document</label>
<div class="input-group">
<input type="file" class="form-control" name="file" id="file"/>
</div> 
</div>
</div>
</div>
  <p class="text-center"><input  type="submit" class="btn btn-primary btn-sm waves-effect waves-light" ></button></p>
</div>
</form>

<?php if ($_SESSION['msg'] != null) { ?>

<div class="alert alert-danger" id="alerts">
<?php
if ($_SESSION['msg'] == "success") {
//echo "successfully added";
}
?>
</div>
<?php } ?>

<?php include 'footer.php'; ?>
</div>
<!-- /.main-content -->
</div>
<!--/#wrapper -->

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
$(document).ready(function (e) {
 $("#form").on('submit',(function(e) {
  e.preventDefault();
  $.ajax({
         url: "action/action_assign_task.php",
   type: "POST",
   data:  new FormData(this),
   contentType: false,
         cache: false,
   processData:false,
   beforeSend : function()
   {
    //$("#preview").fadeOut();
    $("#err").fadeOut();
   },
   success: function(data)
    alert (data);
      {
        alert (data);
        // alert("successfully added");
    if(data=='success')
    {
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
      $("#form")[0].reset(); 
     // invalid file format.
     // $("#err").html("Invalid File !").fadeIn();
    }
    else
    {
      $('#error').html("Failure some connection issues");
     // view uploaded file.
     // $("#preview").html(data).fadeIn();
     // 
    }
      },
     error: function(e) 
      {
    $("#err").html(e).fadeIn();
      }          
    });
 }));
});
</script>

</body>
</html>
</body>
</html>