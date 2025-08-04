<div class="fixed-navbar">
<div class="pull-left">
<button type="button" class="menu-mobile-button glyphicon glyphicon-menu-hamburger js__menu_mobile"></button>
<!-- /.page-title -->
</div>
<!-- /.pull-left -->
<div class="pull-right">

<!-- /.ico-item -->
<div class="ico-item fa fa-arrows-alt js__full_screen"></div>

<!-- /.ico-item -->
<a href="#" class="ico-item pulse"><span class="ico-item fa fa-bell notice-alarm js__toggle_open" data-target="#notification-popup"></span></a>
<div class="ico-item">
<i class="fa fa-sign-out"></i>
<ul class="sub-ico-item">

<li><a  href="logout.php">Log Out</a></li>
</ul>
<!-- /.sub-ico-item -->
</div>
<!-- /.ico-item -->
</div>
<!-- /.pull-right -->
</div>

<div id="notification-popup" class="notice-popup js__toggle" data-space="50">
<h2 class="popup-title">Your Notifications</h2>
<!-- /.popup-title -->
<div class="content">
<ul class="notice-list">

	<?php
require_once 'process/dao.php';

$user = getUserDetailsById($_SESSION["user"]);
foreach ($user as $dval) {
 $userId=$dval['id'];
$userLevel=$dval['user_level'];
}

$val= pendingTaskDetails($userLevel,$userId);
foreach ($val as $cval) {

?>
<?php if ($_SESSION["user_level"]==2) {
	 ?>
<li>
<a href="pending_task_list.php">
	
<span class="name"><?php echo $cval['task_title']?></span>
<span class="desc"><?php echo $cval['task_description']?></span>
<span class="time"><?php echo $cval['start_date']?></span>
<span class="date"><?php echo $cval['end_date']?></span>

</a>
</li>
	<?php } ?> 
	<?php } ?>
</ul>
<!-- /.notice-list -->
<a href="pending_task_list.php" class="notice-read-more">See more messages <i class="fa fa-angle-down"></i></a>
</div>
<!-- /.content -->
</div>
<!-- /#notification-popup -->