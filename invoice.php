<?php
session_start();
if (!$_SESSION["user"]) {
    header('location:index.php');
} 
error_reporting(0);

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

<link rel="stylesheet" href="assets/plugin/datepicker/css/bootstrap-datepicker.min.css">

<!-- DateRangepicker -->
<link rel="stylesheet" href="assets/plugin/daterangepicker/daterangepicker.css">
<link rel="stylesheet" href="assets/styles/style.min.css">

<!-- Material Design Icon -->
<link rel="stylesheet" href="assets/fonts/material-design/css/materialdesignicons.css">

<!-- mCustomScrollbar -->
<link rel="stylesheet" href="assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

<!-- Waves Effect -->
<link rel="stylesheet" href="assets/plugin/waves/waves.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src='select2/dist/js/select2.min.js' type='text/javascript'></script>

<!-- CSS -->
<link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
var count = 1;
var OTotal=0;
var OVamt=0;
var OPrice=0;
var eaval=0;
</script>
</head>

<body>
<?php 
include 'side_header.php';
include 'top_header.php';
include 'product_ajax_for_invoice.php';
require_once 'process/dao.php';
$estimationId=$_GET["id"];
$available_bal=$_GET["available"];
$listClient=listClients();
if ($estimationId!='') {
	include 'helpers/config.php';
	
$query = "select (c.id)cId,c.en_firstname, c.en_lastname, c.ar_firstname, c.en_address, c.ar_address,c.en_com_name,c.ar_com_name, c.ar_lastname,c.en_phone_no,c.ar_phone_no,
e.estimation_date,e.po_number,e.credit_days,e.client_name,e.ar_client_name,e.exclude_vat,e.client_id,e.expiry_date,e.payment_terms,e.vat_amount,e.total,e.discount, e.discount_vat,e.discount_total,e.total
from clients c, estimation e where e.client_id=c.id and e.id=".$estimationId;

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$cId = $row['cId'];
$en_firstname = $row['en_firstname'];
$ar_firstname = $row['ar_firstname'];
$client_name = $row['client_name']; 
$ar_client_name = $row['ar_client_name']; 
$en_com_name = $row['en_com_name'];
$ar_com_name = $row['ar_com_name'];
$en_address = $row['en_address'];
$ar_address = $row['ar_address']; 
$en_phone_no = $row['en_phone_no'];
$ar_phone_no = $row['ar_phone_no'];
$client_id = $row['client_id'];
$estimation_date = $row['estimation_date'];
$po_number = $row['po_number'];
$credit_days = $row['credit_days'];
$expiry_date = $row['expiry_date'];
$exclude_vat = $row['exclude_vat'];
$vat_amount = $row['vat_amount'];
$discount_total = $row['discount_total'];
$discount_vat = $row['discount_vat'];
$discount = $row['discount'];
$total = $row['total'];
$payment_terms = $row['payment_terms'];
}

?>
<!-- /.main-menu -->

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<!-- /.col-lg-6 col-xs-12 -->   
<!-- /.col-xs-12 -->

<form class="form-horizontal" id="insert_form">
<div class="box-content card white">
<h4 class="box-title">Invoice</h4>
<div class="card-content">

<div class="col-lg-6 col-xs-12">

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Clients / <span class="arabic">العملاء</span></label>
<div class="col-sm-9">
	<input type="hidden"  class="form-control" name="estimation_id" id="estimation_id" value=" " readonly>
	<input type="hidden"  class="form-control" name="eavl_bal" id="eavl_bal" value="<?php echo($available_bal);?> " readonly>
	<?php if ($estimationId!='') { ?>
		<input type="hidden"  class="form-control" name="estimation_id" id="estimation_id" value="<?php echo $estimationId; ?>" readonly>
		<input type="hidden"  class="form-control" name="client_id" id="client_id" value="<?php echo $cId; ?>" readonly>
	<input type="text"  class="form-control"  value="<?php echo $en_com_name.'/'.$ar_com_name; ?>" readonly>
	<?php }else{ ?>
<select class="form-control" id='selUser' name="client_id"  >
<option value="0">Select</option>
<?php
foreach($listClient as $cval){?>

<option value="<?php echo $cval['id']; ?>"><?php echo $cval['en_firstname']; ?></option>
<?php } ?>
</select>
<?php }?>
</div>
</div>
<!-- /.box-title -->  

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Issue date / <span class="arabic">تاريخ الإنشاء</span></label>
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control issue_date" placeholder="mm/dd/yyyy" name="issue_date" id="datepicker-autoclose">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div>
</div>
</div>


<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">PO Number / <span class="arabic">رقم أمر الشراء</span></label>
<div class="col-sm-9">
<input class="form-control ponumber po" type="text" name="ponumber" value="">
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Due date / <span class="arabic">تاريخ الإستحقاق</span></label>
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control duedate" name="due_date" placeholder="mm/dd/yyyy" id="datepicker">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div>  <!-- /.input-group -->

</div>
</div>


<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Credit Days / <span class="arabic">مدة فترة الدفع المستحقة</span></label>
<div class="col-sm-9">
<select class="form-control" name="credit_days" id="credit_days">

<option>Select</option>
<option value="05">05</option>
<option value="10">10</option>
<option value="30">30</option>
<option value="75">75</option>
</select>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Notes / <span class="arabic">ملاحظات</span></label>
<div class='col-sm-9'>
<textarea class='form-control ponumber' type='text' name='notes' value="">
</textarea>
</div>
</div>

</div>

<div class="col-lg-6 col-xs-12">
<!-- /.right columns -->
<?php if ($estimationId!='') { ?>
	<div clss='row'>
<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Address (EN)</label>
<div class='col-sm-9'>
<textarea class='form-control ponumber' type='text' name='en_address' readonly=''><?php echo $en_address; ?>
</textarea>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label arabic'>العنوان</label>
<div class='col-sm-9'>
<textarea class='form-control ponumber arabic' type='text' name='ar_address' readonly=''><?php echo $ar_address; ?>
</textarea>
</div>
</div>
</div>

<div clss='row'>
<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Phone No. (EN)</label>
<div class='col-sm-9'>
<input class='form-control ponumber' type='text' name='en_phone_no' value='<?php echo $en_phone_no; ?>' readonly=''>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label arabic'>رقم الجوال</label>
<div class='col-sm-9'>
<input class='form-control ponumber arabic' type='text' name='ar_phone_no' value='<?php echo $ar_phone_no; ?>' readonly=''>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Available Balance</label>
<div class='col-sm-9'>
<input class='form-control ponumber' type='text' name='avail_bal' value='<?php echo $available_bal; ?>' readonly=''>
</div>
</div>
</div>

<div clss='row'>
<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Client Name (EN)</label>
<div class='col-sm-9'>
<input class='form-control ponumber' type='text' name='client_name' value='<?php echo $client_name; ?>'>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label arabic'>اسم العميل</label>
<div class='col-sm-9'>
<input class='form-control ponumber arabic' type='text' name='ar_client_name' value='<?php echo $ar_client_name; ?>'>
</div>
</div>
</div>

</div>
<?php }else{ ?>
<div id="txtHint"></div>
<?php }?>
</div>

</div>
<!--  below div whitebox end div -->
</div>

<div class="table-responsive">
<span id="error"></span>

<table class="table table-bordered" id="crud_table">
<thead>
<tr>
<th>S.No / <span class="arabic_no_right">الرقم التسلسلي</span></th>
<th>Item / <span class="arabic_no_right">القطعة</span></th>
<th>Description(EN)</th>
<th class="arabic_no_right">الوصف</th>
<th>Qty / <span class="arabic_no_right">الكمية</span></th>
<th>UOM / <span class="arabic_no_right">نوع العمل</span></th>
<th>Price / <span class="arabic_no_right">السعر</span></th>
<th>VAT % / <span class="arabic_no_right">نسبة الضريبة</span></th>
<th>VAT Amount / <span class="arabic_no_right">قيمة الضريبة</span></th>
<th>Total / <span class="arabic_no_right">الإجمالي </span></th>
<th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
</tr>
</thead>
<tbody>
	<?php 
	if ($estimationId!='') { 
		
$count = 0;
$query2 = "SELECT (p.id)pId,ed.product_id,p.en_pname, p.en_description,ed.description,ed.ar_description,ed.qty,ed.uom,ed.price,ed.vat,ed.vat_amount,ed.row_total FROM estimation_details ed, products p, estimation e where ed.product_id=p.id and e.id=ed.estimation_id and e.id=".$estimationId;
$result = mysqli_query($conn, $query2);
 
while ($row = mysqli_fetch_array($result)) {
$obj = array("pId" => $row['pId'], 
"en_pname" => $row['en_pname'],
// "en_description" => $row['en_description'],
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
<td  width="30"><input type="text" readonly class="form-control s_no " name="s_no[]" id="s_no_<?php echo $count; ?>" value="<?php echo $count; ?>"/></td>

<td  width="200"><select name="product_id[]" class="form-control product_id" data-sub_category_id="<?php echo $count; ?>" id="product_id_<?php echo $count; ?>"><option value="<?php echo $obj['pId']; ?>"><?php echo $obj['en_pname']; ?></option><?php  fill_select_box(); ?></select></td>

<td  width="200" ><input type="text" id="product_desc_<?php echo $count; ?>"  name="product_desc[]" class="form-control product_desc" value="<?php echo $obj['description'];?>" /></td>

<td  width="200" ><input type="text" id="ar_product_desc_<?php echo $count; ?>"  name="ar_product_desc[]" class="form-control ar_product_desc" value="<?php echo $obj['ar_description'];?>" /></td>

<td  width="100"><input type="text" name="qty[]"  id="qty_<?php echo $count; ?>" class="form-control qty cond" value="<?php echo $obj['qty'];?>" /></td>
<td  width="100"><input type="text" name="uom[]" class="form-control uom " id="uom_<?php echo $count; ?>" value="<?php echo $obj['uom'];?>" /></td>
<td  width="100"><input type="text" name="price[]" class="form-control price cond"  id="price_<?php echo $count; ?>" value="<?php echo $obj['price'];?>" /></td>
<td  width="70"><input type="text"  name="vat[]" class="form-control vat cond"  id="vat_<?php echo $count; ?>" value="<?php echo $obj['vat'];?>"  /></td>
<td  width="100"><input type="text" name="vatamount[]" class="form-control vatamount cond" id="vatamount_<?php echo $count; ?>" value="<?php echo $obj['vat_amount'];?>" /></td>
<td  width="200"><input type="text" name="line_total[]" class="form-control linetotal cond" id="lineTotal_<?php echo $count; ?>" readonly value="<?php echo $obj['row_total'];?>"/></td>
<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>
</tr>
<script>
count="<?php echo $count; ?>";
</script>
<?php }?>
</tbody>


<?php } else {?>
<tr>

<td  width="30"><input type="text" readonly class="form-control s_no " name="s_no[]" id="s_no_1" value="1"/></td>

<td  width="200"><select name="product_id[]" class="form-control product_id" data-sub_category_id="1" id="product_id_1"><option value="">Select Category</option><?php  fill_select_box(); ?></select></td>

<td  width="200" ><input type="text" id="product_desc_1"  name="product_desc[]" class="form-control product_desc" /></td>

<td  width="200" ><input type="text" id="ar_product_desc_1"  name="ar_product_desc[]" class="form-control ar_product_desc" /></td>
<td  width="100"><input type="text" name="qty[]"  id="qty_1" class="form-control qty cond" /></td>

<td  width="100"><input type="text" name="uom[]" class="form-control uom " id="uom_1" /></td>

<td  width="100"><input type="text" name="price[]" class="form-control price cond"  id="price_1" /></td>

<td  width="70"><input type="text"  name="vat[]" class="form-control vat cond"  id="vat_1"  /></td>

<td  width="100"><input type="text" name="vatamount[]" class="form-control vatamount cond" id="vatamount_1" /></td>

<td  width="200"><input type="text" name="line_total[]" class="form-control linetotal cond" id="lineTotal_1" /></td>

<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>
</tr>

</tbody>

<?php }?>
<tfoot>  
        
<th>Total / <span class="arabic_no_right">الإجمالي </span></th>  
<th></th> 
<th></th>                                
<th></th>                                
<th></th>
<th></th>                                

<th style="text-align:center;" ><input type="text" class="form-control totalPrice   ftotal " readonly name="totalPrice" id="totalPrice" /></th>
<th></th>
<th style="text-align:center;" ><input type="text" class="form-control totalVatAmt   ftotal " readonly name="totalVatAmt" id="totalVatAmt" /></th>
<th style="text-align:center;" ><input type="text" class="form-control totalAmt  ftotal " readonly name="totalAmt" id="totalAmt" /></th>
<th></th>
          
</tfoot>
<!-- <tfoot>  
 -->
<!-- <th>Discount</th>  
<th></th> 
<th></th>                                
<th></th>                                
<th></th>                                

<th><input type="text" class="form-control discount damt " name="discount" id="discount" /></th>
<th ><input type="text" class="form-control discount dvat " name="discountVat" id="discountVat" /></th>
<th style="text-align:center;"  ><input type="text" class="form-control dVat  ftotal " readonly name="dVat" id="dVat" /></th>
<th style="text-align:center;" ><input type="text" class="form-control dTotal  ftotal " readonly name="dTotal" id="dTotal" /></th>
<th ></th> -->
          
<!-- </tfoot> -->

</table>
<div align="center">

<input type="submit" name="submit" id="id_1" class="btn btn-info" value="submit"/>

</div>
</div>  

</form>
<!-- /.card-content -->

<!-- /.row -->

<!-- /.row small-spacing -->    
<?php include 'footer.php'; ?>
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

</body>
</html>
</body>
</html>
<script>

$(document).ready(function(){
  // alert("sjs");

$('#selUser').on('change',function(){
 // alert("d"); 
var q = $(this).val();
// alert(q);
$.ajax({
type:'POST',
url:'fetch_client_details.php',
data:'q='+q,
success:function(html){
// alert(html);
$('#txtHint').html(html);
}});
});


// Initialize select2
$("#selUser").select2();

$(document).on('click', '.add', function(){
count++;
var html = '';
// alert(count);
// textbox3.value = answer;
html += '<tr>';
html += '<td  width="30"><input type="text" readonly class="form-control s_no " name="s_no[]" id="s_no_'+count+'" value="'+count+'"/></td>';

html += '<td  width="200"><select name="product_id[]" class="form-control product_id" data-sub_category_id="'+count+'" id="product_id_'+count+'"><option value="">Select Category</option><?php  fill_select_box(); ?></select></td>';
html += '<td  width="200" ><input type="text" id="product_desc_'+count+'"  name="product_desc[]" class="form-control product_desc" /></td>';
html += '<td  width="200" ><input type="text" id="ar_product_desc_'+count+'"  name="ar_product_desc[]" class="form-control ar_product_desc" /></td>';
html += '<td  width="100"><input type="text" name="qty[]"  id="qty_'+count+'" class="form-control qty cond" /></td>';
html += '<td  width="100"><input type="text" name="uom[]" class="form-control uom " id="uom_'+count+'" /></td>';
html += '<td  width="100"><input type="text" name="price[]" class="form-control price cond"  id="price_'+count+'" /></td>';
html += '<td  width="70"><input type="text"  name="vat[]" class="form-control vat cond"  id="vat_'+count+'"  /></td>';
html += '<td  width="100"><input type="text" name="vatamount[]" class="form-control vatamount cond" id="vatamount_'+count+'" /></td>';
html += '<td  width="200"><input type="text" name="line_total[]" class="form-control linetotal cond" id="lineTotal_'+count+'" /></td>';
html += '<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>';
$('tbody').append(html);
});

$(document).on('click', '.remove', function(){
$(this).closest('tr').remove();
});

$(document).on('keyup', '.cond', function(){

var ids=$(this).attr('id');
var res = ids.split("_")[1];

var Qty=$('#qty_'+res).val();
 eaval=$('#eavl_bal').val();
// alert(eaval)

var Price=$('#price_'+res).val();
var Vat=$('#vat_'+res).val();
// alert(Qty);
// $('#qty_'+res).focus();
// $('#qty_'+res).select();
var result = Qty * Price; 
var vatResult = (Vat / 100) * result;
var totalWithVat =result + vatResult;

$('#vatamount_'+res).val(vatResult.toFixed(2));
$('#lineTotal_'+res).val(totalWithVat);
// $('.totaQty').html(totalWithVat);
// alert("guo");
total();


});
// $(document).on('keyup', '.discount', function(){
// //   // alert("h");
// var dprice=$('#discount').val();
// // alert(dprice);
// var dvat=$('#discountVat').val();
// // alert(dvat);
// var result = dprice;
// var dvatResult = (dvat/100) * result;
// var dtotalResult = Number(dprice)+Number(dvatResult);
// $('.dVat').val(dvatResult);

// $('.dTotal').val(dtotalResult);
// // alert(OTotal);
// // alert(OVamt);
// var finalTotal=Number(OTotal)-Number(dtotalResult);
// var finalVat=Number(OVamt)-Number(dvatResult);
// var finalPrice=Number(finalTotal)-Number(finalVat);

// // var finalPrice=Number(OPrice)-Number(dtotalResult);

// // alert(Number(OTotal)+'-'+Number(dtotalResult));OPrice
// $('.totalAmt').val(finalTotal.toFixed(2));
// $('.totalVatAmt').val(finalVat.toFixed(2));
// $('.totalPrice').val(finalPrice.toFixed(2));  

// });

$(document).on('change', '.product_id', function(){

var product_id = $(this).val();
// alert ("sdsd"+product_id);
var sub_category_id = $(this).data('sub_category_id');
// alert("sdkutu"+sub_category_id);
$.ajax({
url:"product_description_for_invoice.php",
method:"POST",
data:{product_id:product_id},
success:function(data)
{
// alert(data);
var html =  data;
var desc=data.split("++");
$('#product_desc_'+sub_category_id).val(desc[0]);
$('#ar_product_desc_'+sub_category_id).val(desc[1]);  

}
})
});

$('#insert_form').on('submit', function(event){
event.preventDefault();
var error = '';


$('#selUser').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Client Id</p>';
return false;
}

});

$('.issue_date').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Issue Date</p>';
return false;
}

});  
$('#totalAmt').each(function(){

if($(this).val() == '')
{
error += '<p>InValid Total Enter Valid Amount</p>';
return false;
}

});   

$('.po').each(function(){

if($(this).val() == '')
{
// alert($(this).val());
error += '<p>Enter PO Number</p>';
return false;
}

});     

$('.duedate').each(function(){

if($(this).val() == '')
{
error += '<p>Enter DueDate</p>';
return false;
}

}); 


$('.sno').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});
$('.qty').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});

$('.qty').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});

$('.qty').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});


$('.uom').each(function(){
var count = 1;

if($(this).val() == '')
{
error += '<p>Select Item Category at '+count+' row</p>';
return false;
}

count = count + 1;

});

$('.price').each(function(){

var count = 1;

if($(this).val() == '')
{
error += '<p>Select Item Sub category '+count+' Row</p> ';
return false;
}

count = count + 1;

});

$('.vat').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});
$('.vatamount').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});
$('.line_total').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Item name at '+count+' Row</p>';
return false;
}
count = count + 1;
});
 
var form_data = $(this).serialize();

if(error == '')
{

$.ajax({
url:"action/action_insert_Invoice.php",
method:"POST",
data:form_data,
success:function(data)
{
	//alert(data);
if(data != ''){
	 window.open('print_sidebar_invoice.php?invoice_id='+data);
	 window.location.href='list_invoice.php';
//window.location.href = 'print_sidebar_invoice.php?invoice_id='+data;

$('#item_table').find('tr:gt(0)').remove();
$('#error').html('<div class="alert alert-success">Item Details Saved</div>');
}
}
});

}

else
{
//alert($('.ar_product_desc').val());

$('#error').html('<div class="alert alert-danger">'+error+'</div>');
}

});

});

function total()  
{  

var t=0;  
var v=0;
var p=0;
$('.linetotal').each(function(i,e){  
var amt =$(this).val()-0;  
t+=amt; 

}); 
$('.vatamount').each(function(i,e){  
var vamt =$(this).val()-0;  
v+=vamt;  
}); 
$('.price').each(function(i,e){  
var amt =$(this).val()-0;  
p+=amt;  
}); 
OTotal=t;
// alert(eaval);
// alert(OTotal);
 if (eaval < OTotal) {
 	// alert("true");
	document.getElementById("id_1").disabled = true; 
}else{
	// alert("false");
	document.getElementById("id_1").disabled = false; 
}
// alert(eaval);


$('.totalAmt').val(t.toFixed(2));  
OVamt=v;
$('.totalVatAmt').val(v.toFixed(2)); 
OPrice=t-v;
$('.totalPrice').val(OPrice.toFixed(2)); 
// alert(OTotal);

}



//else{

// function myFunction() {
//   document.getElementById("demo").innerHTML = "Hello World";

function confirmDialog(message, handler){
  $(`<div class="modal fade" id="myModal" role="dialog"> 
     <div class="modal-dialog"> 
       <!-- Modal content--> 
        <div class="modal-content"> 
           <div class="modal-body" style="padding:10px;"> 
             <h4 class="text-center">${message}</h4> 
             <div class="text-center"> 
               <a class="btn btn-danger btn-yes">Yes</a> 
               <a class="btn btn-default btn-no">No</a> 
             </div> 
           </div> 
       </div> 
    </div> 
  </div>`).appendTo('body');
 
  //Trigger the modal
  $("#myModal").modal({
     backdrop: 'static',
     keyboard: false
  });
  
   //Pass true to a callback function
   $(".btn-yes").click(function () {
       handler(true);
       $("#myModal").modal("hide");
   });
    
   //Pass false to callback function
   $(".btn-no").click(function () {
       handler(false);
       $("#myModal").modal("hide");
   });

   //Remove the modal once it is closed.
   $("#myModal").on('hidden.bs.modal', function () {
      $("#myModal").remove();
   });
}

</script>

