<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
} 
$estimation_id = $_GET["estimation_id"];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Estimation</title>

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

<div id="wrapper">
<div class="main-content">
<div class="row">
<div class='col-md-2'></div>
    <div class='col-md-6'></div>
    <div class='col-md-4'> 
        <a href='#' data-remodal-target="remodal"><button class="btn btn-warning" style="font-size: 16px;line-height: 26px;padding: 8px 25px;border: none;font-weight: 500;">Print</button></a>
        <a href='update_estimation.php?id=<?php echo $estimation_id;?>'><button class="btn btn-info" style="font-size: 16px;line-height: 26px;padding: 8px 25px;border: none;font-weight: 500;">Edit</button></a>
    </div>
</div>

<!-- partial:index.partial.html -->
<div class="container my-5 px-5 py-3">
  <div class="row" style="margin-top: 20px;">
  <div class="col-md-1 offset-1">
    <img src="assets/images/invoice_logo.jpg" class="image" />
  </div>
  <div class="col-md-6">
  </div>
  <div class="col-md-4 offset-8">
    <h2 class="text-center">ESTIMATION / <span class="arabic_font">التسعيرة</span></h2>
  </div>
</div>
<?php
 
include('helpers/config.php');

$query = "select (e.id)estimation_id,e.client_id,e.estimation_date,e.client_name,e.ar_client_name,e.po_number,e.credit_days,e.expiry_date,e.exclude_vat,e.payment_terms,e.discount_total,e.discount,e.discount_vat,
e.vat_amount,e.total,c.en_firstname,c.ar_firstname,c.en_com_name,c.ar_com_name,(c.en_address)cEnAdress,c.en_phone_no,c.ar_firstname,(c.ar_address)cArAddress,c.ar_phone_no,e.estimation_date,c.tax_no,cd.en_name,cd.en_phone_no,cd.en_address,cd.email,cd.en_bank_details,cd.en_vat,en_tax,cd.ar_name,cd.ar_phone_no,cd.ar_address,cd.ar_bank_details,cd.ar_vat,cd.ar_tax from estimation e, clients c,company_details cd where c.id=e.client_id and e.id=".$estimation_id;
// echo $query;
$result = mysqli_query($conn,$query) ;
 $row = mysqli_fetch_assoc($result);
// while ($row = mysqli_fetch_array($result)) {
$estimation_id = $row['estimation_id'];
// echo $billId;
$client_id = $row['client_id'];
$en_firstname = $row['en_firstname'];  
$ar_firstname = $row['ar_firstname']; 
$client_name = $row['client_name']; 
$ar_client_name = $row['ar_client_name']; 
$en_com_name= $row['en_com_name'];
$ar_com_name= $row['ar_com_name'];
$en_address = $row['en_address'];  
$estimation_date = $row['estimation_date'];
$po_number = $row['po_number'];
$total = $row['total'];
$discount = $row['discount'];
$discount_vat = $row['discount_vat'];
$discount_total = $row['discount_total'];
$estimation_date = $row['estimation_date'];
$credit_days = $row['credit_days'];
$expiry_date = $row['expiry_date'];
$tax_no = $row['tax_no'];
$en_name = $row['en_name']; //company en name 
$en_phone_no = $row['en_phone_no'];  
$cEnAdress = $row['cEnAdress']; //client en address
$cArAddress = $row['cArAddress']; //client ar address
$email = $row['email'];  
$en_bank_details = $row['en_bank_details']; 
$en_vat = $row['en_vat'];
$en_tax =$row['en_tax'];
$ar_name = $row['ar_name']; //company ar name 
$ar_phone_no = $row['ar_phone_no'];
$ar_address = $row['ar_address'];
$ar_bank_details = $row['ar_bank_details'];
$payment_terms= $row['payment_terms'];
$ar_tax = $row['ar_tax'];
$ar_tax = $row['ar_tax'];
$exclude_vat = $row['exclude_vat'];
$vat_amount = $row['vat_amount'];
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
      echo $en_com_name;
    echo "<br>"; 
    $input = $cEnAdress; 
    $output = str_replace(',', '<br />', $input);
  
    echo $output;  
    ?></h5></div>
 
  </div>
</div>
<div class="col-6 letter-title1">
<div class="row">
    <div class="col-10"><h5 class="arabic_font">
      <?php 
       echo $ar_com_name;
    echo "<br>";  
      $input = $cArAddress; 
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
  <h5>Tax Registration No: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $tax_no;?></h5>
  <h5>Name of the Buyer:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $client_name;?></h5>
</div>
<div class="col-6 letter-title1">
  
  <h5><?php echo $tax_no;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="arabic_font">رقم التسجيل الضريبي</span> </h5>
  <h5><span class="arabic_font">إسم المشتري</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $ar_client_name;?></h5>
  
</div>
</div>
</div>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-3 pl-5 py-2 letter-title">
</div>
<div class="col-9 py-2 letter-title1">
  <div class="row inn2">
    <div class="col-7"><h5>Estimation Date / <span class="arabic_font">تاريخ التسعيرة</span></h5></div>
    <div class="col-5 lis"><h5><?php echo date('d/m/Y',strtotime($estimation_date));?></h5></div>
  </div>
  <div class="row inn2">
    <div class="col-7"><h5>Estimation No / <span class="arabic_font">رقم التسعيرة</span></h5></div>
    <div class="col-5 lis"><h5>ES-YS20-<?php echo $estimation_id;?></h5></div>
  </div>

<div class="row inn2">
    <div class="col-7"><h5>Credit Days / <span class="arabic_font">مدة فترة الدفع المستحقة</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $credit_days;?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Expiry Date / <span class="arabic_font">تاريخ الإنتهاء </span></h5></div>
    <div class="col-5 lis"><h5><?php echo date('d/m/Y',strtotime($expiry_date));?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Tax No of Supplying Company  /<span class="arabic_font">رقم التسجيل الضريبي للشركة</span></h5></div>
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
<th scope="col">DESCRIPTION(en)</th>
<th scope="col">DESCRIPTION(ar)</th>
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
<th scope="col">الكمية</th>
<th scope="col">نوع العمل</th>
<th scope="col">السعر</th>
<th scope="col">نسبة الضريبة</th>
<th scope="col">قيمة الضريبة</th>
<th scope="col">الإجمالي </th>
</tr>
</thead>
<tbody>
<?php
include_once('helpers/config.php');
$estimation_id = $_GET["estimation_id"];
$count = 0;
$query2 = "SELECT ed.product_id,p.en_pname, p.en_description , ed.description,ed.ar_description,ed.qty,ed.uom,ed.price,ed.vat,ed.vat_amount,ed.row_total FROM estimation_details ed, products p, estimation e where ed.product_id=p.id and e.id=ed.estimation_id and e.id=".$estimation_id;
$result = mysqli_query($conn, $query2);
 
while ($row = mysqli_fetch_array($result)) {
$obj = array("en_pname" => $row['en_pname'],
"ar_description" => $row['ar_description'],
"description" => $row['description'],  
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
<td style="text-align:right;"><?php echo $obj['ar_description'];?></td>

<td><?php echo $obj['qty'];?></td>
<td><?php echo $obj['uom'];?></td>
<td><?php echo $obj['price'];?><span class="arabic_font">﷼</span> </td>
<td><?php echo $obj['vat'];?>%</td>
<td><?php echo $obj['vat_amount'];?><span class="arabic_font">﷼</span> </td>
<td><?php echo $obj['row_total'];?><span class="arabic_font">﷼</span> </td>
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
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $ste=$exclude_vat+$discount;?></h5></div>
  </div>
  <div class="row inn">
    <div class="col-7"><h5>VAT Amount / <span class="arabic_font">قيمة الضريبة</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php $dvat=($discount_vat/100) * $discount;echo $stv=$vat_amount+$dvat;?></h5></div>
  </div>
   <div class="row inn">
    <div class="col-7"><h5>Sub Total / <span class="arabic_font">القيمة</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $ste+$stv;?></h5></div>
</div>
  <div class="row inn">
    <div class="col-7"><h5>Discount / <span class="arabic_font">التخفيض</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $discount;?></h5></div>
</div>
<div class="row inn">
    <div class="col-7"><h5>Discount Vat / <span class="arabic_font">تخفيض الضريبة</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php $DVat=($discount_vat/100) * $discount;echo $DVat;?></h5></div>
</div>
<div class="row inn">
    <div class="col-7"><h5>Discount Total /<span class="arabic_font">اإجمالي التخفيض</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $discount_total;?></h5></div>
</div>
<div class="row inn">
    <div class="col-7"><h5>Grand Total / <span class="arabic_font">المبلغ الإجمالي</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $total;?></h5></div>
</div>

<!-- <div class="row inn">
    <div class="col-7"><h5>Balance due / <span class="arabic_font">الرصيد المستحق</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $total;?></h5></div>
</div> -->

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
    <div class="col-12">
      <h5>Payment Terms :</h5><h5> 
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
    include_once 'process/dao.php';
    $tot = $total;
    // echo "sd".$tot;
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
    <a href="estimation_print_with_header.php?estimation_id=<?php echo $estimation_id;?>" class="remodal-confirm">Yes</a>
    <a href="estimation_print_without_header.php?estimation_id=<?php echo $estimation_id;?>" class="remodal-cancel">No</a>
</div>

</body>
</html>

