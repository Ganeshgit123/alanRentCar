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
<h4 class="box-title">Update Assign Task</h4>
 
  <?php              
      require_once 'process/dao.php';    
        $sid=$_GET["id"];
        $listus= listAssignTaskById($sid);
         ?>
         <?php $count=0;
            foreach ($listus as $cval) { ?>

<div class="card-content">
  <div class="row"><span id="error"></span></div>
<div class="row">
  
		<div class="col-md-6">
<input type="hidden" name="" id="id" value="<?php echo $sid ?>">
<div class="form-group">
<label for="exampleInputEmail1">Task Assign To <span class="required">*</span></label>
<select class="form-control assigned_to" name="assigned_to" id="assigned_to">
<!-- <option value="0">Select</option> -->
                   
                  <option value="<?php echo $cval['assigned_to'] ?>"><?php echo $cval['en_firstname'] ?></option>
                

   </select>
</div>
<div class="form-group">
<label for="exampleInputEmail1">Task Title<span class="required">*</span></label>
<input type="text" class="form-control" id="task_title" name="task_title" placeholder="Title of the Task" name="task_title" value="<?php echo $cval['task_title']?>">
</div>

<div class="form-group">
<label for="exampleInputEmail1">Task Description<span class="required">*</span></label>
<textarea class="form-control" id="task_description" name="task_description" placeholder="Description of the task"><?php echo $cval['task_description']?></textarea>
</div>
		</div>

		<div class="col-md-6">
<div class="form-group">
<label for="exampleInputEmail1">Start Date<span class="required">*</span></label>
<div class="input-group">
<input type="text" class="form-control start_date" name="start_date" placeholder="mm/dd/yyyy" id="datepicker-autoclose" value="<?php echo $cval['start_date']?>">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div> 
</div>
<div class="form-group">
<label for="exampleInputEmail1">End Date<span class="required">*</span></label>
<div class="input-group">
<input type="text" class="form-control end_date" name="end_date" placeholder="mm/dd/yyyy" id="datepicker" value="<?php echo $cval['end_date']?>">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div> 
</div>
</div>
</div>
<?php }?>
<p class="text-center"><button type="submit" class="btn btn-primary btn-sm waves-effect waves-light" onclick="callResult()">Submit</button></p>
</div>
   
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

<script src="assets/scripts/export.js"></script>

<script type="text/javascript">
function callResult(){
// alert("sfkmlj");
$('#alerts').hide();
var id = $("#id").val();
var assigned_to = $("#assigned_to").val();
var task_title = $("#task_title").val();
var task_description = $("#task_description").val();
var start_date = $(".start_date").val();
var end_date = $(".end_date").val();


if (assigned_to=='' || task_title=='' || task_description=='' ||
  start_date=='' || end_date=='') {
  error='enter all  fields';
    $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }else{
$.ajax({

type: "GET",
url: 'action/action_update_assign_task.php',
data: "id="+id+"&assigned_to="+assigned_to+"&task_title="+task_title+"&task_description="+task_description+"&start_date="+start_date+"&end_date="+end_date, 
success: function(data) {
	// alert(data);
  if (data!='') {
    window.location.href='completed_task_list.php';
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