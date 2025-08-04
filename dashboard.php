<?php
session_start();
error_reporting(0);
// ini_set('display_errors', 1);
// error_reporting(E_ALL);
if (!$_SESSION["user"]) {
	header('location:index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>Home - alanzirentacar</title>

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

	<!-- Percent Circle -->
	<link rel="stylesheet" href="assets/plugin/percircle/css/percircle.css">

	<!-- Chartist Chart -->
	<link rel="stylesheet" href="assets/plugin/chart/chartist/chartist.min.css">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>

	<!-- Color Picker -->
	<link rel="stylesheet" href="assets/color-switcher/color-switcher.min.css">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>

	<link rel="stylesheet" href="assets/styles/calender.css">
</head>

<body>

	<!-- /.main-menu -->
	<?php include 'side_header.php';
	include 'top_header.php';
	include 'helpers/config.php';
	include 'functions.php';
	?>


	<div id="wrapper">
		<div class="main-content">
			<div class="row small-spacing">

				<?php
				if ($_SESSION["user_level"] == 1) {
					$query = "select count(*) as cCount from clients";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$cCount = $row['cCount']; ?>
					<div class="col-sm-6 col-lg-3 col-xs-12">
						<div class="box-content bg-info text-white">
							<div class="statistics-box with-icon">
								<i class="ico small fa fa-user-plus"></i>
								<p class="text text-white">Clients</p>
								<h3 class="counter"><?php echo $cCount; ?></h3>
							</div>
						</div>
					</div>
				<?php
				} else {
					$query = "select count(*) as cCount from Estimation where created_by=" . $_SESSION["user"];
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$cCount = $row['cCount'];
				?>
					<div class="col-sm-6 col-lg-3 col-xs-12">
						<div class="box-content">
							<h4 class="box-title text-orange">Estimation Created</h4>
							<div class="dropdown js__drop_down">
							</div>
							<div class="content widget-stat">
								<div id="traffic-sparkline-chart-3" class="left-content"></div>
								<div class="right-content">
									<h3 class="counter text-danger"><?php echo $cCount; ?></h3>
									<!-- <p class="text text-danger">Active Clients</p> -->
								</div>
							</div>
						</div>
					</div>
				<?php }	?>

				<!-- /.col-sm-6 col-lg-3 col-xs-12 -->

				<?php if ($_SESSION["user_level"] == 1) {
					$query = "select (sum(IFNULL(i.total,0))-sum(IFNULL(i.received_amount,0)))iDue from invoice i";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$iDue = $row['iDue'];
				?>
					<div class="col-sm-6 col-lg-3 col-xs-12">
						<div class="box-content bg-success text-white">
							<div class="statistics-box with-icon">
								<i class="ico small fa fa-book"></i>
								<p class="text text-white"> Invoice Due</p>
								<h3 class="counter"><?php echo number_format($iDue, 2, '.', ''); ?></h3>
							</div>
						</div>
					</div>
				<?php
				} else {
					$query = "select sum(IFNULL(i.total,0))iDue from invoice i where created_by=" . $_SESSION["user"];
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$iDue = $row['iDue'];
				?>
					<div class="col-sm-6 col-lg-3 col-xs-12">
						<div class="box-content">
							<h4 class="box-title text-success">Invoice Total</h4>
							<div class="dropdown js__drop_down">
							</div>
							<div class="content widget-stat">
								<div id="traffic-sparkline-chart-2" class="left-content margin-top-10"></div>
								<div class="right-content">
									<h3 class="counter text-success"><?php echo $iDue; ?></h3>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>


				<?php
				if ($_SESSION["user_level"] == 1) {
					// echo $_SESSION["user_level"];
					$query = "select (sum(IFNULL(b.total,0)))-(sum(IFNULL( b.received_amount,0)))bDue from bill b";
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$bDue = $row['bDue']; ?>
					<div class="col-sm-6 col-lg-3 col-xs-12">

						<div class="box-content bg-danger text-white">
							<div class="statistics-box with-icon">
								<i class="ico small mdi mdi-receipt"></i>
								<p class="text text-white">Overall Bill Due</p>
								<h3 class="counter"><?php echo $bDue; ?></h3>
							</div>
						</div>
					</div>
				<?php } else {
					$query = "select sum((IFNULL(i.total,0)))iDue from invoice i where created_by=" . $_SESSION["user"];
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$iDue = $row['iDue'];
				?>
					<div class="col-sm-6 col-lg-3 col-xs-12">
						<div class="box-content">
							<h4 class="box-title text-orange">Invoice Due</h4>
							<div class="dropdown js__drop_down">
							</div>
							<div class="content widget-stat">
								<div id="traffic-sparkline-chart-3-custom" class="left-content"></div>
								<div class="right-content">
									<h3 class="counter text-orange"><?php echo $bDue; ?></h3>
								</div>
							</div>
						</div>
					</div>
				<?php } ?>
				<?php
				if ($_SESSION["user_level"] == 1) {
					$query2 = "SELECT MONTHNAME(STR_TO_DATE(ir.receipt_date,'%m/%d/%Y'))Month,sum(payment)totalInvoice,
COALESCE(r.totalReceipt, 0)totalReceipt
FROM invoice_receipt_details ir
LEFT JOIN(select sum(payment)totalReceipt,receipt_date
from bill_receipt_details) as r on
MONTH(STR_TO_DATE(r.receipt_date,'%m/%d/%Y'))= MONTH(STR_TO_DATE(ir.receipt_date,'%m/%d/%Y'))  	
";
					$result2 = mysqli_query($conn, $query2);
					$row = mysqli_fetch_assoc($result2);
					$totalInvoice = $row['totalInvoice'];
					$totalReceipt = $row['totalReceipt'];
				?>
					<div class="col-sm-6 col-lg-3 col-xs-12">

						<div class="box-content bg-warning text-white">
							<div class="statistics-box with-icon">
								<i class="ico small fa fa-line-chart"></i>
								<p class="text text-white">Profit </p>
								<h3 class="counter"><?php echo $totalInvoice - $totalReceipt; ?></h3>
							</div>
						</div>
					</div>
				<?php } else {
					$query = "select count(*) as cCount from clients where id=" . $_SESSION["user"];
					$result = mysqli_query($conn, $query);
					$row = mysqli_fetch_assoc($result);
					$cCount = $row['cCount']; ?>
					<div class="col-sm-6 col-lg-3 col-xs-12">
						<div class="box-content">
							<h4 class="box-title text-orange">Clients</h4>
							<div class="dropdown js__drop_down">
							</div>
							<div class="content widget-stat">
								<div id="traffic-sparkline-chart-1" class="left-content"></div>
								<div class="right-content">
									<h3 class="counter text-danger"><?php echo $cCount; ?></h3>
									<!-- <p class="text text-danger">Active Clients</p> -->
								</div>
							</div>
						</div>
					</div>

				<?php } ?>

			</div>


			<!-- .row -->
			<div class="row small-spacing">
				<div class="col-lg-6 col-xs-12">
					<div class="box-content">
						<h4 class="box-title">Sales</h4>
						<!-- /.box-title -->
						<div class="dropdown js__drop_down">


						</div>
						<?php
						//index.php
						// $connect = mysqli_connect("localhost", "root", "", "alanzirentacar");
						if ($_SESSION["user_level"] == 1) {
							$query = "SELECT MONTHNAME(STR_TO_DATE(e.estimation_date,'%m/%d/%Y'))Month,sum(total)totalEstimation,
COALESCE(i.totalInvoice,0)totalInvoice,COALESCE(r.totalReceipt, 0)totalReceipt
FROM estimation e
LEFT JOIN(select sum(total)totalInvoice,issue_date
from invoice group by MONTH(STR_TO_DATE(issue_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(issue_date,'%m/%d/%Y')))as i on
MONTH(STR_TO_DATE(i.issue_date,'%m/%d/%Y'))= MONTH(STR_TO_DATE(estimation_date,'%m/%d/%Y'))
LEFT JOIN(select sum(payment)totalReceipt,receipt_date
from invoice_receipt_details  group by   MONTH(STR_TO_DATE(receipt_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(receipt_date,'%m/%d/%Y'))) as r on
MONTH(STR_TO_DATE(r.receipt_date,'%m/%d/%Y'))= MONTH(STR_TO_DATE(estimation_date,'%m/%d/%Y'))
where YEAR(STR_TO_DATE(e.estimation_date,'%m/%d/%Y'))=YEAR(CURDATE())
group by MONTH(STR_TO_DATE(e.estimation_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(e.estimation_date,'%m/%d/%Y'))";
						} else {
							$query = "SELECT MONTHNAME(STR_TO_DATE(e.estimation_date,'%m/%d/%Y'))Month,sum(total)totalEstimation,
COALESCE(i.totalInvoice,0)totalInvoice,COALESCE(r.totalReceipt, 0)totalReceipt
FROM estimation e
LEFT JOIN(select sum(total)totalInvoice,issue_date
from invoice where created_by=" . $_SESSION["user"] . " group by MONTH(STR_TO_DATE(issue_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(issue_date,'%m/%d/%Y')))as i on
MONTH(STR_TO_DATE(i.issue_date,'%m/%d/%Y'))= MONTH(STR_TO_DATE(estimation_date,'%m/%d/%Y'))
LEFT JOIN(select sum(payment)totalReceipt,receipt_date
from invoice_receipt_details where created_by=" . $_SESSION["user"] . "   group by   MONTH(STR_TO_DATE(receipt_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(receipt_date,'%m/%d/%Y'))) as r on
MONTH(STR_TO_DATE(r.receipt_date,'%m/%d/%Y'))= MONTH(STR_TO_DATE(estimation_date,'%m/%d/%Y'))
where created_by=" . $_SESSION["user"] . "
group by MONTH(STR_TO_DATE(e.estimation_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(e.estimation_date,'%m/%d/%Y'))";
						}

						$result = mysqli_query($conn, $query);
						$chart_data = '';
						while ($row = mysqli_fetch_array($result)) {
							$totalEstimation = number_format($row["totalEstimation"], 2, '.', '');
							if (empty($chart_data))
								$chart_data .= "{ mnth:'" . $row["Month"] . "', totalEstimation:" . $totalEstimation . ",totalInvoice:" . $row["totalInvoice"] . ",totalReceipt:" . $row["totalReceipt"] . "}, ";
						}
						$chart_data = substr($chart_data, 0, -1);
						?>
						<!-- /.dropdown js__dropdown -->
						<!-- <canvas id="bar-chartjs-char" class="chartjs-chart" width="480" height="320"></canvas> -->
						<div id="chart-container">
							<div id="bar-chart" class="morris-chart" width="480" height="320"></div>
							<div class="text-center">
								<ul class="list-inline morris-chart-detail-list">
									<li style="color:#47D180;"><i class="fa fa-circle"></i>Estimation Total </li>
									<li style="color:#FF1744;"><i class="fa fa-circle"></i>Invoice Total </li>
									<li style="color:#00AEFF;"><i class="fa fa-circle"></i>Inovice Receipt Total </li>
								</ul>
							</div>
						</div>
						<!-- /#bar-chartjs-chart.chartjs-chart -->
					</div>
					<!-- /.box-content -->
				</div>
				<!-- /.col-xs-12 -->

				<?php
				if ($_SESSION["user_level"] == 1) {
					$query1 = "SELECT MONTHNAME(STR_TO_DATE(b.bill_date,'%m/%d/%Y'))Month,sum(total)totalBill,
COALESCE(r.totalReceipt, 0)totalReceipt
FROM bill b
LEFT JOIN(select sum(payment)totalReceipt,receipt_date
from bill_receipt_details  group by   MONTH(STR_TO_DATE(receipt_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(receipt_date,'%m/%d/%Y'))) as r on
MONTH(STR_TO_DATE(r.receipt_date,'%m/%d/%Y'))= MONTH(STR_TO_DATE(b.bill_date,'%m/%d/%Y'))
where YEAR(STR_TO_DATE(b.bill_date,'%m/%d/%Y'))=YEAR(CURDATE())
group by   MONTH(STR_TO_DATE(bill_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(bill_date,'%m/%d/%Y'))";
					$result1 = mysqli_query($conn, $query1);
					$chart_data1 = '';
					while ($row = mysqli_fetch_array($result1)) {
						if (empty($chart_data1))
							$chart_data1 .= "{ mnth:'" . $row["Month"] . "', totalBill:" . $row["totalBill"] . ",totalReceipt:" . $row["totalReceipt"] . "}, ";
					}
					$chart_data1 = substr($chart_data1, 0, -1);
					// print_r($chart_data1);
				?>
					<div class="col-lg-6 col-xs-12">
						<div class="box-content">
							<h4 class="box-title">Vendor Bills</h4>
							<!-- /.box-title -->
							<div class="dropdown js__drop_down">


							</div>

							<!-- /.dropdown js__dropdown -->
							<div id="bar-char" class="morris-chart" width="480" height="320"></div>
							<div class="text-center">
								<ul class="list-inline morris-chart-detail-list">
									<li style="color:#F9C851;"><i class="fa fa-circle"></i>Vendor Bill Total </li>
									<li style="color:#3AC9D6;"><i class="fa fa-circle"></i>Bill Receipt Total </li>
								</ul>
							</div>

						</div>
						<!-- /.box-content -->
					</div>
				<?php } else { ?>

					<div class="col-lg-6 col-xs-12">

						<div id="calendar_div">
							<?php echo get_calender_full(); ?>
						</div>

					</div>

				<?php } ?>

				<!-- /.col-xs-12 -->
			</div>
			<?php
			if ($_SESSION["user_level"] == 1) {
				$query2 = "SELECT MONTHNAME(STR_TO_DATE(ir.receipt_date,'%m/%d/%Y'))Month,sum(payment)totalInvoice,
COALESCE(r.totalReceipt, 0)totalReceipt
FROM invoice_receipt_details ir
LEFT JOIN(select sum(payment)totalReceipt,receipt_date
from bill_receipt_details  group by   MONTH(STR_TO_DATE(receipt_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(receipt_date,'%m/%d/%Y'))) as r on
MONTH(STR_TO_DATE(r.receipt_date,'%m/%d/%Y'))= MONTH(STR_TO_DATE(ir.receipt_date,'%m/%d/%Y'))
where YEAR(STR_TO_DATE(ir.receipt_date,'%m/%d/%Y'))=YEAR(CURDATE())
group by MONTH(STR_TO_DATE(ir.receipt_date,'%m/%d/%Y')),YEAR(STR_TO_DATE(ir.receipt_date,'%m/%d/%Y'))";
				$result2 = mysqli_query($conn, $query2);
				$chart_data2 = '';
				while ($row = mysqli_fetch_array($result2)) {
					if (empty($chart_data2))
						$chart_data2 .= "{ mnth:'" . $row["Month"] . "', totalInvoice:" . $row["totalInvoice"] . ",totalReceipt:" . $row["totalReceipt"] . "}, ";
				}
				$chart_data2 = substr($chart_data2, 0, -1);
				// print_r($chart_data1);
			?>

				<div class="row small-spacing">
					<div class="col-lg-6 col-xs-12">
						<div class="box-content">
							<h4 class="box-title">Profit & Loss</h4>

							<div id="bar-cha" class="morris-chart" width="480" height="320"></div>
							<div class="text-center">
								<ul class="list-inline morris-chart-detail-list">
									<li style="color:#F9C851;"><i class="fa fa-circle"></i>Total Income </li>
									<li style="color:#3AC9D6;"><i class="fa fa-circle"></i>Total Expense </li>
								</ul>
							</div>
						</div>
					</div>



					<div class="col-lg-6 col-xs-12">

						<div id="calendar_div">
							<?php echo get_calender_full(); ?>
						</div>

					</div>

				<?php } ?>

				</div>



		</div>
		<!-- /.main-content -->
	</div><!--/#wrapper -->

	<script src="assets/scripts/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="assets/scripts/modernizr.min.js"></script>
	<script src="assets/plugin/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
	<script src="assets/plugin/nprogress/nprogress.js"></script>
	<script src="assets/plugin/sweet-alert/sweetalert.min.js"></script>
	<script src="assets/plugin/waves/waves.min.js"></script>
	<!-- Full Screen Plugin -->
	<script src="assets/plugin/fullscreen/jquery.fullscreen-min.js"></script>

	<!-- Google Chart -->
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

	<!-- chart.js Chart -->
	<script src="assets/plugin/chart/chartjs/Chart.bundle.min.js"></script>
	<script src="assets/scripts/chart.chartjs.init.min.js"></script>
	<!-- <script src="assets/scripts/dasboard-bar.js"></script> -->

	<!-- FullCalendar -->
	<script src="assets/plugin/moment/moment.js"></script>
	<script src="assets/plugin/fullcalendar/fullcalendar.min.js"></script>
	<script src="assets/scripts/fullcalendar.init.js"></script>

	<!-- Sparkline Chart -->
	<script src="assets/plugin/chart/sparkline/jquery.sparkline.min.js"></script>
	<script src="assets/scripts/chart.sparkline.init.min.js"></script>

	<script src="assets/scripts/main.min.js"></script>
	<script src="assets/color-switcher/color-switcher.min.js"></script>
</body>

</html>
<script type="text/javascript">
	var data = [
			<?php echo $chart_data;
			// console.log($chart_data);
			?>
		],
		config = {
			data: data,
			xkey: 'mnth',
			ykeys: ['totalEstimation', 'totalInvoice', 'totalReceipt'],
			labels: ['Estimation Total', 'Invoice Total', 'Receipt Total'],
			fillOpacity: 0.6,
			hideHover: 'auto',
			behaveLikeLine: true,
			resize: true,
			// pointFillColors:['#000000'],
			// pointStrokeColors: ['black'],
			barColors: ['#47D180', '#FF1744', '#00AEFF'],
		};
	config.element = 'bar-chart';
	Morris.Bar(config);
</script>
<script type="text/javascript">
	var data1 = [
			<?php echo $chart_data1;
			// console.log($chart_data1);
			?>
		],
		config1 = {
			data: data1,
			xkey: 'mnth',
			ykeys: ['totalBill', 'totalReceipt'],
			labels: ['Bill Total ', 'Receipt Total '],
			fillOpacity: 0.6,
			hideHover: 'auto',
			behaveLikeLine: true,
			resize: true,
			// pointFillColors:['#000000'],
			// pointStrokeColors: ['black'],
			barColors: ['#F9C851', '#3AC9D6'],
		};
	config1.element = 'bar-char';
	Morris.Bar(config1);
</script>
<script type="text/javascript">
	var data2 = [
			<?php echo $chart_data2;
			// console.log($chart_data1);
			?>
		],
		config1 = {
			data: data2,
			xkey: 'mnth',
			ykeys: ['totalInvoice', 'totalReceipt'],
			labels: ['Total Income ', 'Total Expense '],
			fillOpacity: 0.6,
			hideHover: 'auto',
			behaveLikeLine: true,
			resize: true,
			// pointFillColors:['#000000'],
			// pointStrokeColors: ['black'],
			barColors: ['#F9C851', '#3AC9D6'],
		};
	config1.element = 'bar-cha';
	Morris.Bar(config1);
</script>