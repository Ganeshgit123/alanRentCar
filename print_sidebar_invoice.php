<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
} 
$invoice_id = $_GET["invoice_id"];
?>
<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">
<title>Invoice</title>
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
        <a href='update_invoice.php?id=<?php echo $invoice_id?>'><button class="btn btn-info" style="font-size: 16px;line-height: 26px;padding: 8px 25px;border: none;font-weight: 500;">Edit</button></a>
    </div>
</div>

<div class="container my-5 px-5 py-3">
  <div class="row" style="margin-top: 20px;">
  <div class="col-md-1 offset-1">
     <img src="assets/images/invoice_logo.jpg" class="image" />
  </div>
   <div class="col-md-11" style="text-align:right">
 <?php

include('phpqrcode/qrlib.php');

include_once('process/dao.php');

$val = invoiceFormDetailsById($invoice_id);
 
foreach ($val as $cval) {
//$dateformat = date('d-m-Y',$cval['issue_date']);

  $dataToEncode = [
    [1, $cval['en_name']],
    [2, $cval['en_vat']],
    [3,  date('Y-m-d h:i',strtotime($cval['issue_date'])) ],
    [4, $cval['total'] ],
    [5, $cval['vat_amount'] ]
];

}


function __getLength($value) {
    return strlen($value);
}

function __toHex($value) {
   return pack("H*", sprintf("%02X", $value));
}

function __toString($__tag, $__length, $__value) {
    $value = (string) $__value; 
    return __toHex($__tag).__toHex($__length). $value ;
}

function __getTLV($dataToEncode) {
    $__TLVS = '';
    for ($i = 0; $i < count($dataToEncode); $i++) {
        $__tag   = $dataToEncode[$i][0];
        $__value = $dataToEncode[$i][1];
        $__length = __getLength($__value);
        $__TLVS .= __toString($__tag, $__length, $__value);
    }

    return $__TLVS;
}

$__TLV = __getTLV($dataToEncode);
$__QR = base64_encode($__TLV);
 

        $folder="images/";

    $filename = time().'.png' ;
    copy('images/qr.png', 'images/'.$filename);
  // $file=time().".png";
        $file_name=$folder.$filename;
        QRcode::png($__QR,$file_name); // used $text3 from the concatenated variables
        $name = "<img src='images/".$filename."'>";

        echo   $name ;
 
 ?>
  </div>
  <div class="col-md-4 offset-8">
    <h2 class="text-center">INVOICE /<span class="arabic_font">فاتورة عميل</span></h2>
  </div>
</div>
<?php
 
include_once('process/dao.php');
// $invoice_id =17;
$val = invoiceFormDetailsById($invoice_id);
foreach ($val as $cval) {
//$dateformat = date('d-m-Y',$cval['issue_date']);
?>

<div class="container-fluid invoice-letter">
<div class="row">
<div class="col-6 pl-5 py-2 letter-title" style="margin-top: 0;">
  <div class="row">
    <div class="col-2"><h5>From</h5></div>
    <div class="col-10"><h5>
    <?php  
    echo $cval['en_name'];
    echo "<br>"; 
    $input = $cval['compEnAddress']; 
    $output = str_replace(',', '<br />', $input);
    echo $output;  
    ?></h5></div>
  </div>
</div>
<div class="col-6 letter-title1">
<div class="row">
    <div class="col-10"><h5 class="arabic_font"><?php  
    echo $cval['ar_name'];
    echo "<br>"; 
    $input = $cval['compArAddress']; 
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
     echo $cval['en_com_name'];
     echo "<br>";
    $input = $cval['en_address'];
    $output = str_replace(',', '<br />', $input);
    echo $output;  
    ?></h5></div>
 
  </div>
</div>
<div class="col-6 letter-title1">
<div class="row">
    <div class="col-10"><h5 class="arabic_font">
      <?php  
       echo $cval['ar_com_name'];
     echo "<br>";
      $input = $cval['ar_address']; 
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
  <h5>Tax Registration No: <span style="text-indent: 45px;"><?php echo $cval['tax_no'];?></span></h5>
  <h5>Name of the Buyer:<span style="text-indent: 45px;">&nbsp;&nbsp;<?php echo $cval['client_name'];?></span></h5>
</div>
<div class="col-6 letter-title1">
  <!-- <h5><?php echo $cval['tax_no'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="arabic_font">رقم التسجيل الضريبي</span> </h5>
  <h5><?php echo $cval['ar_firstname']." ".$cval['ar_lastname'];?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="arabic_font">اسم المشتري</span></h5> -->
  <h5><?php echo $cval['tax_no'];?>&nbsp;&nbsp;&nbsp;<span class="arabic_font">رقم التسجيل الضريبي</span> </h5>
  <h5><span class="arabic_font">إسم المشتري</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="arabic_font"><?php echo $cval['ar_client_name'];?></span></h5>
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
    <div class="col-5 lis"><h5><?php echo date('d/m/Y',strtotime($cval['issue_date']));?></h5></div>
  </div>
  <div class="row inn2">
    <div class="col-7"><h5>Invoice No / <span class="arabic_font">رقم الفاتورة</span></h5></div>
    <div class="col-5 lis"><h5>INV-YS20-<?php echo $cval['invoiceId'];?></h5></div>
  </div>
<div class="row inn2">
    <div class="col-7"><h5>PO No. / <span class="arabic_font">رقم أمر الشراء</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $cval['po_number'];?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Credit Days / <span class="arabic_font">مدة فترة الدفع المستحقة</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $cval['credit_days'];?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Due Date / <span class="arabic_font">تاريخ الإستحقاق</span></h5></div>
    <div class="col-5 lis"><h5><?php echo date('d/m/Y',strtotime($cval['due_date']));?></h5></div>
</div>
<div class="row inn2">
    <div class="col-7"><h5>Tax No of Supplying Company  /<span class="arabic_font">رقم التسجيل الضريبي للشركة</span></h5></div>
    <div class="col-5 lis"><h5><?php echo $cval['en_vat'];?></h5></div>
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
// include_once('helpers/config.php');
// $invoice_id = $_GET["invoice_id"];
// include_once('process/dao.php');
$invoice_id = $_GET["invoice_id"];
// $invoice_id =17; 
$wval = listInvoiceDetailsById($invoice_id);
$count = 0;
foreach ($wval as $dval) {
  $count = $count+1;
?>
<tr>
<th scope="row"><?php echo $count; ?></th>
<td><?php echo $dval['en_pname'];?></td>
<td style="text-align:left;"><?php echo $dval['description'];?></td>
<td class="arabic_font" style="text-align:right;"><?php echo $dval['ar_description'];?></td>
<td><?php echo $dval['qty'];?></td>
<td><?php echo $dval['uom'];?></td>
<td><?php echo $dval['price'];?><span class="arabic_font">﷼</span> </td>
<td><?php echo $dval['vat'];?>%</td>
<td><?php echo $dval['vat_amount'];?><span class="arabic_font">﷼</span> </td>
<td><?php echo $dval['row_total'];?><span class="arabic_font">﷼</span> </td>
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
    <div class="col-5"><h5 style="text-align: center;">SAR <?php
    echo $cval['exclude_vat'];?></h5></div>
  </div>
  <div class="row inn">
    <div class="col-7"><h5>VAT Amount / <span class="arabic_font">قيمة الضريبة</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $cval['vat_amount'];?></h5></div>
  </div>
<div class="row inn">
    <div class="col-7"><h5>Total / <span class="arabic_font">الإجمالي </span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $cval['total'];?></h5></div>
</div>
<div class="row inn">
    <div class="col-7"><h5>Balance due / <span class="arabic_font">الرصيد المستحق</span></h5></div>
    <div class="col-5"><h5 style="text-align: center;">SAR <?php echo $cval['total'];?></h5></div>
</div>

</div>
</div>
</div>

<div class="container-fluid invoice-letter" style="margin-left: 2rem;">
<div class="row">
<div class="col-6 pl-5 letter-title">
</div>
<div class="col-6 letter-title1">
 <div class="row">
    <div class="col-2"><h5>Amount:</h5></div>
    <?php 
    // include 'process/dao.php';
    $tot = $cval['total'];;
    $totWor = getCurrency($tot); ?>
    <div class="col-10"><h5><?php echo $totWor;?></h5></div>
  </div>
</div>
</div>
</div>


<div class="container-fluid invoice-letter pt-3" style="margin-left: 2rem;">
<div class="row">
<div class="col-5 pl-5 py-2 letter-title bank">
  <div class="row">
    <div class="col-12"><h5> 
      <?php  
      $input = $cval['en_bank_details'];; 
      $output = str_replace(',', '<br />', $input);
      echo $output;  
      ?></h5>

    <div class="row">
    <div class="col-2"><h5>Email:</h5></div>
    <div class="col-10"><a href="mailto:accounts@alanzirentacar.com"><h5 style="text-align: left;"><?php echo $cval['email'];?></h5></a></div>
  </div>
      </div>
  </div>
</div>
<div class="col-1"></div>
<div class="col-6 py-2 letter-title bank">
 <div class="row">
    <div class="col-12">
    <h5> 
      <?php  
      $input = $cval['notes'];; 
      $output = str_replace(',', '<br />', $input);
      echo $output;  
      ?></h5>
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
    <a href="invoice_print_with_header.php?invoice_id=<?php echo $invoice_id ;?>" class="remodal-confirm">Yes</a>
    <a href="invoice_print_without_header.php?invoice_id=<?php echo $invoice_id ;?>" class="remodal-cancel">No</a>
</div>

</body>
<?php } ?>
</html>

