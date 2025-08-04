<!DOCTYPE html>
<html lang="en">
<?php
session_start();
$_SESSION['msg'] = "";
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Company Details List</title>

<!-- Main Styles -->
<link rel="stylesheet" href="assets/styles/style.min.css">

<!-- Material Design Icon -->
<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">

<!-- Sweet Alert -->
<link rel="stylesheet" href="assets/plugin/sweet-alert/sweetalert.css">

<!-- Table Responsive -->
<link rel="stylesheet" href="assets/plugin/RWD-table-pattern/css/rwd-table.min.css">

</head>

<body>

<?php include 'side_header.php' ; ?>

<?php include 'top_header.php' ; ?>

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">
<div class="col-xs-12">
<div class="box-content">
<p class="text-right"><a href="add_company.php"><button type="button" class="btn waves-effect waves-light">Add New</button></a></p>

<div class="table-responsive" data-pattern="priority-columns">

 <div class="table-responsive">
<table id="tech-companies-1" class="table table-small-font table-bordered table-striped">
<thead>
<tr>
<th>Id</th>
<th>Name(EN)</th>
<th>Name(AR)</th>
<th>Phone.No(EN)</th>
<th>Phone.No(AR)</th>
<th>Address(EN)</th>
<th>Address(AR)</th>
<th>Email</th>
<th>Bank Details(EN)</th>
<!-- <th>Bank Details(AR)</th> -->
<th>Vat(EN)</th>
<!-- <th>Vat(AR)</th> -->
<th>Tax(EN)</th>
<!-- <th>Tax(AR)</th> -->

<th>Action</th>
</tr>
</thead>
<tbody>

<?php
require_once 'process/dao.php';
$val= list_Company_details();
$count=0;
foreach ($val as $cval) {
$count=$count+1;
?>

<tr>
<td><?php echo $count ?></td>
<td><?php echo $cval['en_name']?></td>
<td><?php echo $cval['ar_name']?></td>

<td><?php echo $cval['en_phone_no']?></td>
<td><?php echo $cval['ar_phone_no']?></td>

<td><?php echo $cval['en_address']?></td>
<td><?php echo $cval['ar_address']?></td>
<td><?php echo $cval['email']?></td>
<td><?php echo $cval['en_bank_details']?></td>
<!-- <td><?php echo $cval['ar_bank_details']?></td> -->
<td><?php echo $cval['en_vat']?></td>
<!-- <td><?php echo $cval['ar_vat']?></td> -->
<td><?php echo $cval['en_tax']?></td>
<!-- <td><?php echo $cval['ar_tax']?></td> -->

<td>
<a href="update_company_details.php?id=<?php  echo $cval['id']?>">&nbsp;&nbsp;<button type="button" class="btn btn-warning btn-circle btn-xs waves-effect waves-light"><i class="ico fa fa-pencil"></i></button></a></td>
</tr>     
<?php } ?> 
<tr>

</tbody>
</table>
</div> 
</div>
<!-- /.box-content -->
</div>
<!-- /.col-lg-6 col-xs-12 -->
</div>
</div>
<!-- /.row small-spacing -->    
<footer class="footer">
<ul class="list-inline">
<li>2016 © NinjaAdmin.</li>
<li><a href="#">Privacy</a></li>
<li><a href="#">Terms</a></li>
<li><a href="#">Help</a></li>
</ul>
</footer>
</div>
<!-- /.main-content -->
</div><!--/#wrapper -->
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

<!-- Responsive Table -->
<script src="assets/plugin/RWD-table-pattern/js/rwd-table.min.js"></script>
<script src="assets/scripts/rwd.demo.min.js"></script>

<script src="assets/scripts/main.min.js"></script>
<script src="assets/color-switcher/color-switcher.min.js"></script>
</body>
</html>