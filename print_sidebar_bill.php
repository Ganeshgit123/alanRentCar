<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
} 
$bill_id = $_GET["bill_id"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
<meta name="description" content="">
<meta name="author" content="">

<title>Alanzirentacar</title>

<link rel="stylesheet" href="assets/styles/style.min.css">

<link rel='stylesheet' href='assets/styles/print_page.css'>

<link rel="stylesheet" href="assets/plugin/modal/remodal/remodal.css">
    <link rel="stylesheet" href="assets/plugin/modal/remodal/remodal-default-theme.css">

<link rel="stylesheet" href="assets/styles/table.css">

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
<?php include 'side_header.php';
include 'top_header.php';
?>
<!-- /.main-menu -->

<div id="wrapper">
<div class="main-content">
<div class="row">
<div class='col-md-2'></div>
    <div class='col-md-6'></div>
    <div class='col-md-4'> 
        <a href='#' data-remodal-target="remodal"><button class="btn btn-warning" style="font-size: 16px;line-height: 26px;padding: 8px 25px;border: none;font-weight: 500;">Print</button></a>
        <a href='update_bill.php?bill_id=<?php echo $bill_id;?>'><button class="btn btn-info" style="font-size: 16px;line-height: 26px;padding: 8px 25px;border: none;font-weight: 500;">Edit</button></a>
    </div>
</div>

<div class="container my-5 px-5 py-3">
<div class="row" style="margin-top: 20px;">
  <div class="col-md-1 offset-1">
    <img src="assets/images/invoice_logo.jpg" class="image" />
  </div>
  <div class="col-md-6">
  </div>
  <div class="col-md-4 offset-8">
     <h2 class="text-center">PURCHASE ORDER/<span class="arabic_font">فاتورة</span></h2>
  </div>
</div>
<?php
 
include('helpers/config.php');

// $bill_id = $_GET["bill_id"];
$query = "select (b.id)billId,b.vendor_id,b.bill_date,b.po_number,b.credit_days,b.due_date,b.exclude_vat,
b.vat_amount,b.total,v.en_vname,v.ar_vname,b.received_amount,(v.en_address)vEnAdress,v.en_contact_person,v.ar_vname,(v.ar_address)vArAddress,v.ar_contact_person,v.ar_company_name,b.bill_date,v.vat_id,cd.en_name,cd.en_phone_no,cd.en_address,cd.email,cd.en_bank_details,cd.en_vat,en_tax,cd.ar_name,cd.ar_phone_no,cd.ar_address,cd.ar_bank_details,cd.ar_vat,cd.ar_tax,b.payment_terms,v.en_company_name,v.ar_company_name
from bill b, vendor v,company_details cd where v.id=b.vendor_id and b.id=".$bill_id;
$result = mysqli_query($conn, $query) ;
 $row = mysqli_fetch_assoc($result);
// while ($row = mysqli_fetch_array($result)) {
$billId = $row['billId'];
// echo $billId;
$vendor_id = $row['vendor_id'];
$en_vname = $row['en_vname'];  
$ar_vname = $row['ar_vname']; 
$en_address = $row['en_address'];  
$bill_date = $row['bill_date'];
$po_number = $row['po_number'];
$total = $row['total'];
$received_amount = $row['received_amount'];
$bill_date = $row['bill_date'];
$credit_days = $row['credit_days'];
$due_date = $row['due_date'];
$vat_id = $row['vat_id'];
$en_name = $row['en_name']; //company en name 
$en_phone_no = $row['en_phone_no'];  
$vEnAdress = $row['vEnAdress']; //vendor en address
$vArAddress = $row['vArAddress']; //vendor ar address
$email = $row['email'];  
$en_bank_details = $row['en_bank_details']; 
$en_vat = $row['en_vat'];
$en_tax =$row['en_tax'];
$ar_name = $row['ar_name']; //company ar name 
$ar_phone_no = $row['ar_phone_no'];
$ar_address = $row['ar_address'];
$ar_bank_details = $row['ar_bank_details'];
$ar_vat = $row['ar_vat'];
$ar_tax = $row['ar_tax'];
$exclude_vat = $row['exclude_vat'];
$vat_amount = $row['vat_amount'];
$payment_terms = $row['payment_terms'];
$en_company_name= $row['en_company_name'];
$ar_company_name= $row['ar_company_name'];
?>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 pl-5 py-2 letter-title" style="margin-top: 0;">
  <div class="row">
    <div class="col-2"><h5>From</h5></div>
    <div class="col-10"><h5>
    <?php  
    echo $en_name;
    echo "<br>"; 
    $input = $en_address; 
    $output = str_replace(',', '<br />', $input);
    echo $output;  
    ?></h5></div>
  </div>
</div>
<div class="col-6 letter-title1">
<div class="row">
    <div class="col-10"><h5 class="arabic_font"><?php  
    echo $ar_name;
    echo "<br>"; 
    $input = $ar_address; 
    $output = str_replace(',', '<br />', $input);
    echo $output;  
    ?></h5></div>
    <div class="col-2"><h5 class="arabic_font">من</h5></div>
  </div>
</div>
</div>
</div>

<div class="container-fluid invoice-letter" style="margin-top: -1rem;">
<div class="row">
<div class="col-6 pl-5 py-2 letter-title">
  <div class="row">
    <div class="col-2"><h5>To</h5></div>
    <div class="col-10"><h5>
    <?php  
    echo $en_company_name;
    echo "<br>"; 
    $input = $vEnAdress; 
    $output = str_replace(',', '<br />', $input);
    echo $output;  
    ?></h5></div>
 
  </div>
</div>
<div class="col-6 letter-title1">
<div class="row">
    <div class="col-10"><h5 class="arabic_font">
      <?php  
      echo $ar_company_name;
      echo "<br>"; 
      $input = $vArAddress; 
      $output = str_replace(',', '<br />', $input);
      echo $output;  
      ?>
      </h5></div>
    <div class="col-2"><h5 class="arabic_font">إلى</h5></div>
  </div>
</div>
</div>
</div>

<div class="container-fluid invoice-letter" style="margin-top: -1rem;">
<div class="row">
<div class="col-6 pl-5 py-2 letter-title">
  <h5>Tax Registration No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $vat_id;?></h5>
  <h5>Name of the Buyer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $en_vname;?></h5>
</div>
<div class="col-6 letter-title1">
  <h5><span class="arabic_font"><?php echo $vat_id;?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="arabic_font">رقم التسجيل الضريبي</span> </h5>
  <h5><span class="arabic_font">اسم المشتري</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="arabic_font"><?php echo $ar_vname;?></span></h5>
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-3 pl-5 py-2 letter-title">
</div>
<div class="col-9 py-2 letter-title1">
  <div class="row inn2">
    <div class="col-7"><h5>Issue Date / <span class="arabic_font">تاريخ الإنشاء</span></h5></div>
    <div class="col-5 lis"><h5><?php echo date('d/m/Y',strtotime($bill_date));?></h5></div>
  </div>
  <div class="row inn2">
    <div class="col-7"><h5>Bill No / <span class="arabic_font">رقم الفاتوره</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $billId;?></h5></div>
  </div>
<div class="row inn2">
    <div class="col-7"><h5>PO No. / <span class="arabic_font">ص لا</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $po_number;?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Credit Days / <span class="arabic_font">أيام الائتمان</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $credit_days;?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Due Date / <span class="arabic_font">تاريخ الاستحقاق</span></h5></div>
    <div class="col-5 lis"><h5><?php echo date('d/m/Y',strtotime($due_date));?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Tax No of Supplying Company  /<span class="arabic_font">رقم الضريبة على الشركة الموردة</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $en_vat;?></h5></div>
</div>
</div>
</div>
</div>


<!-- <div class="row table"> -->
<table class="table table-hover"style="padding:0px; margin-left: 1.5rem" >
<thead class="thead" >
<tr>
<th scope="col">S.No</th>
<th scope="col">ITEM</th>
<th scope="col">DESCRIPTION(En)</th>
<th scope="col">DESCRIPTION(Ar)</th>
<th scope="col">QTY</th>
<th scope="col">UOM</th>
<th scope="col">PRICE</th>
<th scope="col">VAT%</th>
<th scope="col">VAT AMOUNT</th>
<th scope="col">TOTAL</th>
</tr>
</thead>
<thead class="arabic_font">
<tr>
<th scope="col">الرقم التسلسلي</th>
<th scope="col">القطعة</th>
<th scope="col">الوصف</th>
<th scope="col">الوصف</th>
<th scope="col">العدد</th>
<th scope="col">وظائف</th>
<th scope="col">السعر</th>
<th scope="col">نسبة الضريبة</th>
<th scope="col">قيمة الضريبة</th>
<th scope="col">الإجمالي</th>
</tr>
</thead>
<tbody>
<?php
include_once('helpers/config.php');
$bill_id = $_GET["bill_id"];
$count = 0;
$query2 = "SELECT bd.product_id,p.en_pname, p.en_description , bd.description, bd.ar_description,bd.qty,bd.uom,bd.price,bd.vat,bd.vat_amount,bd.row_total FROM bill_details bd, products p, bill b where bd.product_id=p.id and b.id=bd.bill_id and b.id=".$bill_id;
$result = mysqli_query($conn, $query2);
 
while ($row = mysqli_fetch_array($result)) {
$obj = array("en_pname" => $row['en_pname'],
"en_description" => $row['en_description'],
"description" => $row['description'], 
"ar_description" => $row['ar_description'], 
"qty" => $row['qty'], 
"uom" => $row['uom'],
"price" => $row['price'],
"vat" => $row['vat'],  
"vat_amount" => $row['vat_amount'], 
"row_total" => $row['row_total']);
$count = $count + 1;
?>
<tr>
<th scope="row"><?php echo $count; ?></th>
<td><?php echo $obj['en_pname'];?></td>
<td style="text-align:left;"><?php echo $obj['description'];?></td>
<td class="arabic_font" style="text-align:right;"><?php echo $obj['ar_description'];?></td>
<td><?php echo $obj['qty'];?></td>
<td><?php echo $obj['uom'];?></td>
<td><?php echo $obj['price'];?><span class="currency">﷼</span> </td>
<td><?php echo $obj['vat'];?>%</td>
<td><?php echo $obj['vat_amount'];?><span class="currency">﷼</span> </td>
<td><?php echo $obj['row_total'];?><span class="currency">﷼</span> </td>
</tr>
<?php } ?>

</tbody>
</table>
<!-- </div> -->

<div class="container-fluid invoice-letter" style="margin-top: -1rem;">
<div class="row">
<div class="col-3 pl-5 py-2 letter-title">
</div>
<div class="col-9 pl-5 py-2 letter-title1">
  <div class="row inn">
    <div class="col-7"><h5>Price Excluding VAT / <span class="arabic_font">السعر بدون الضريبة</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $exclude_vat;?></h5></div>
  </div>
  <div class="row inn">
    <div class="col-7"><h5>VAT Amount / <span class="arabic_font">قيمة الضريبة</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $vat_amount;?></h5></div>
  </div>
<div class="row inn">
    <div class="col-7"><h5>Total / <span class="arabic_font">الإجمالي</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $total;?></h5></div>
</div>
<div class="row inn">
    <div class="col-7"><h5>Balance due / <span class="arabic_font">الرصيد المستحق</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $total;?></h5></div>
</div>

</div>
</div>
</div>

<!-- <div class="row" style="margin-top: 20px;">
  <div class="col-md-1">
   
  </div>
  <div class="col-md-6 offset-5">
     <img width="150px" src="assets/images/seal.png" />
  </div>
  <div class="col-md-4 offset-8">
  </div>
</div>
 -->
<div class="container-fluid invoice-letter pt-3" style="margin-left: 2rem;">
<div class="row">
<div class="col-5 pl-5 py-2 letter-title bank">
  <div class="row">
    <div class="col-12"><h5>Payment Terms :</h5><h5> 
      <?php  
      $input = $payment_terms; 
      $output = str_replace(',', '<br />', $input);
      echo $output;  
      ?></h5></div>
  </div>
<!--   <div class="row">
    <div class="col-12"><h5>Bank&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>Al Rajhi</span></h5></div>
  </div>
  <div class="row">
    <div class="col-12"><h5>A/C No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>300-6080-1080-1337</span></h5></div>
  </div>
  <div class="row">
    <div class="col-12"><h5>IBAN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span>SA-20-8000-0300-6080-1080-1337</span></h5></div>
  </div> -->
</div>
<div class="col-1"></div>
<div class="col-6 py-2 letter-title1">
 <div class="row">
    <div class="col-2"><h5>Amount:</h5></div>
    <?php 

    $tot = $total;
    $totWor = getCurrency($tot); ?>
    <div class="col-10"><h5><?php echo $totWor;?></h5></div>
  </div>
  <br>
  <div class="row">
    <div class="col-2"><h5>Email:</h5></div>
    <div class="col-10"><a href="mailto:accounts@alanzirentacar.com"><h5 style="text-align: center;"><?php echo $email;?></h5></a></div>
  </div>
</div>
</div>
</div>

<p class="text-center mt-3">This is System Generated Report. No signature required.</p>
</div>
<!-- /.row small-spacing -->   
</div>
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

 <script src="assets/plugin/modal/remodal/remodal.min.js"></script>

<div class="remodal" data-remodal-id="remodal" role="dialog" aria-labelledby="modal1Title" aria-describedby="modal1Desc">
    <button data-remodal-action="close" class="remodal-close" aria-label="Close"></button>
    <div class="remodal-content">
        <h2 id="modal1Title">Print With Header</h2>
    </div>
    <a href="bill_print_with_header.php?bill_id=<?php  echo $billId;?>" class="remodal-confirm">Yes</a>
    <a href="bill_print_without_header.php?bill_id=<?php echo $billId;?>" class="remodal-cancel">No</a>
</div>

</body>
</html>
