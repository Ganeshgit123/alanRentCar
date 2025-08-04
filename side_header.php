<div class="main-menu">
<header class="header">
<a href="dashboard.php" class="logo">
	<img src="assets/images/logo.png" alt=""></a>
<button type="button" class="button-close fa fa-times js__menu_close"></button>
</header>
<!-- /.header -->
<div class="content">

<div class="navigation">
<ul class="menu js__accordion">
	<li>
<a class="waves-effect" href="dashboard.php"><i class="menu-icon mdi mdi-view-dashboard"></i><span>Dashboard / <b class="arab">لوحة التحكم</b></span></a>
</li>
<li>
<a class="waves-effect" href="change_password.php"><i class="menu-icon fa fa-key"></i><span>Change Password/ <b class="arab">غير كلمة السر</b></span></a>
</li>
<?php if ($_SESSION["user_level"]==1) {
	 ?>

<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-users"></i><span>Users/ <b class="arab">المستخدمين </b></span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="add_user.php">Add User / <span class="arab">إضافة مستخدم </span></a></li>
<li><a href="user_list.php">Users List/ <span class="arab">قائمة المستخدمين</span></a></li>
</ul>
<!-- /.sub-menu js__content -->
</li>
<?php }?>
<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-user-secret"></i><span>Clients / <b class="arab">العملاء</b><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="add_client.php">Add Client / <span class="arab"> إضافة عميل </span></a></li>
<li><a href="client_list.php">Clients List / <span class="arab">قائمة العملاء</span></a></li>
</ul>
<!-- /.sub-menu js__content -->
</li>
<?php if ($_SESSION["user_level"]==1) {
	 ?>
<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-industry"></i><span>Vendor / <b class="arab">البائع</b></span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="add_vendor.php">Add Vendor / <span class="arab">إضافة بائع</span></a></li>
<li><a href="vendor_list.php">Vendor List / <span class="arab"> قائمة البائعين </span></a></li>
</ul>
<!-- /.sub-menu js__content -->
</li>
<?php }?>

<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-file-o"></i><span>Products / <b class="arab">منتج </b><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="add_product.php">Add Product / <span class="arab">إضافة منتج</span></a></li>
<li><a href="product_list.php">Products List / <span class="arab">قائمة المنتجات</span></a></li>
</ul>
<!-- /.sub-menu js__content -->
</li>
<?php if ($_SESSION["user_level"]==1) {
	 ?>
<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-building"></i><span>Company / <b class="arab"> الشركة </b></span><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="update_company_details.php?id=1">Update Company Details / <span class="arab">تحديث معلومات شركة</span></a></li>

</ul>
<!-- /.sub-menu js__content -->
</li>
<?php }?>
<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-calculator"></i><span>Estimation / <b class="arab">التسعيرة</b><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="estimation.php">Add Estimation / <span class="arab">إضافة تسعيرة</span></a></li>
<li><a href="list_estimation.php">Estimation List / <span class="arab"> قائمة التسعيرات</span></a></li>
</ul>
<!-- /.sub-menu js__content -->
</li>
<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-file-excel-o"></i><span>Invoice / <b class="arab">فاتورة عميل</b><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="invoice.php">Add Invoice / <span class="arab">إضافة فاتورة عميل</span></a></li>
<li><a href="list_invoice.php">Invoice List / <span class="arab">قائمة فاتورة العملاء</span></a></li>
</ul>
<!-- /.sub-menu js__content -->
</li>
<?php if ($_SESSION["user_level"]==1) {
	 ?>

<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon ico mdi mdi-receipt"></i><span>Vendor Bills / <b class="arab">فاتورة بائع مورد</b><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="bill.php">Add Bill / <span class="arab">إضافة فاتورة مورد</span></a></li>
<li><a href="list_bill.php">List Bill / <span class="arab">قائمة الفواتير مورد</span></a></li>
<!-- <li><a href="#">Reprint Bill / <span class="arab">إعادة طبع بيل </span></a></li>
<li><a href="#">Cancel Bill / <span class="arab">إلغاء الفاتورة </span></a></li> -->
<!-- <li><a href="#">Receipt Bill/ <span class="arab"> فاتورة الاستلام</span></a></li> -->
</ul>
<!-- /.sub-menu js__content -->
</li>
<?php }?>




<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-bar-chart"></i><span>Reports / <b class="arab">التقارير</b><span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<?php if ($_SESSION["user_level"]==1) {
	 ?>

<li><a href="date_based_report.php">Date wise report / <span class="arab"> تقرير مفصل بالتاريخ</span></a></li>
<li><a href="bill_due_report.php">Vendor Bill Due Report / <span class="arab">تقرير فاتورة بائع / مورد</span></a></li>
<?php }?>

<li><a href="invoice_due_report.php">Invoice Due Report / <span class="arab"> تقرير فاتورة عميل</span></a></li>
<li><a href="estimation_based_report.php">Estimation Based Report / <span class="arab"> تقرير فاتورة عميل</span></a></li>


</ul>
<!-- /.sub-menu js__content -->
</li>
<?php if ($_SESSION["user_level"]==1) {
	 ?>
<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-book"></i><span>Contract<span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">
<li><a href="add_contract.php">Add Contract</a></li>

<li><a href="contract_list.php">Contract List</a></li>

<li><a href="add_changes_on_contract.php">Add Contract Changes</a></li>

<li><a href="contract_changed_list.php">Contract Changes List</a></li>
</ul>
<!-- /.sub-menu js__content -->
</li>
<?php }?>
<li>
<a class="waves-effect parent-item js__control" href="#"><i class="menu-icon fa fa-tasks"></i><span>Task<span class="menu-arrow fa fa-angle-down"></span></a>
<ul class="sub-menu js__content">

<?php if ($_SESSION["user_level"]==1) {
	 ?>
<li><a href="assign_task.php">Assign a Task</a></li>
<?php }?>
<li><a href="pending_task_list.php">Pending Task List</a></li>
<li><a href="completed_task_list.php">Completed Task List</a></li>

</ul>
<!-- /.sub-menu js__content -->
</li>

</ul>
<!-- /.menu js__accordion -->
</div>
<!-- /.navigation -->
</div>
<!-- /.content -->
</div>