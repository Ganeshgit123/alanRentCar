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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script src='select2/dist/js/select2.min.js' type='text/javascript'></script>

<!-- CSS -->
<link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript">
var count = 0;
var OTotal =0;
var OVamt =0;
var OPrice =0;
</script>
</head>

<body>
<?php 
include 'side_header.php';
include 'top_header.php';
$invoiceId=$_GET["id"];
include 'product_ajax_for_invoice.php';
// require_once 'process/dao.php';
include 'helpers/config.php';
// $listVendor=listClients();

$query = "select (c.id)cId,c.en_firstname, c.en_lastname, c.ar_firstname, c.en_address, c.ar_address, c.ar_lastname,c.en_phone_no,c.ar_phone_no,
i.issue_date,i.po_number,i.due_date,i.credit_days,i.exclude_vat,i.client_id,
i.vat_amount,i.total,i.received_amount,i.discount,i.client_name,i.ar_client_name
from clients c, invoice i where i.client_id=c.id and i.id=".$invoiceId;

$result = mysqli_query($conn,$query);
$row = mysqli_fetch_assoc($result);
$cId = $row['cId'];
$en_firstname = $row['en_firstname'];
$ar_firstname = $row['ar_firstname'];
$client_name = $row['client_name'];
$ar_client_name = $row['ar_client_name'];
$en_address = $row['en_address'];
$ar_address = $row['ar_address'];	
$en_phone_no = $row['en_phone_no'];
$ar_phone_no = $row['ar_phone_no'];
$client_id = $row['client_id'];
$issue_date = $row['issue_date'];
$po_number = $row['po_number'];
$credit_days = $row['credit_days'];
$due_date = $row['due_date'];
$exclude_vat = $row['exclude_vat'];
$vat_amount = $row['vat_amount'];
$total = $row['total'];
$received_amount = $row['received_amount'];
$discount = $row['discount'];


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
		<input type="hidden"  class="form-control" name="id" id="id" value="<?php echo $invoiceId; ?>" readonly>
		<input type="hidden"  class="form-control" name="client_id" id="client_id" value="<?php echo $cId; ?>" readonly>
	<input type="text"  class="form-control"  value="<?php echo $client_name.'/'.$ar_client_name; ?>" readonly>

</div>
</div>
<!-- /.box-title -->  

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Due Date / <span class="arabic">تاريخ الإستحقاق</span></label>
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control duedate" name="due_date" placeholder="mm/dd/yyyy" id="datepicker" value="<?php echo $due_date; ?>">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div>  <!-- /.input-group -->

</div>
</div>


<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Credit Days / <span class="arabic">مدة فترة الدفع المستحقة</span></label>
<div class="col-sm-9">
<select class="form-control" name="credit_days" id="credit_days">

<option value="<?php echo $credit_days; ?>"><?php echo $credit_days; ?></option>
<option value="05">05</option>
<option value="10">10</option>
<option value="30">30</option>
<option value="75">75</option>

</select>
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Issue Date / <span class="arabic">تاريخ الإنشاء</span></label>
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control issue_date" placeholder="mm/dd/yyyy" name="issue_date" id="datepicker-autoclose" value="<?php echo $issue_date; ?>">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div>
</div>
</div>

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">PO Number / <span class="arabic">رقم أمر الشراء</span></label>
<div class="col-sm-9">
<input class="form-control ponumber" type="text" name="ponumber" value="<?php echo $po_number; ?>">
</div>
</div>

</div>

<div class="col-lg-6 col-xs-12">
<!-- /.right columns -->

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
// include_once('helpers/config.php');
// $bill_id = $_GET["bill_id"];
$count = 0;
$query2 = "SELECT (p.id)pId,iv.product_id,p.en_pname, p.en_description , iv.description,iv.ar_description,iv.qty,iv.uom,iv.price,iv.vat,iv.vat_amount,iv.row_total FROM invoice_details iv, products p, invoice i where iv.product_id=p.id and i.id=iv.invoice_id and i.id=".$invoiceId;

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
<?php } ?>
</tbody>
<tfoot>  

<th>Total / <span class="arabic_no_right">الإجمالي </span></th>
<th></th> 
<th></th>
<th></th>                                
<th></th>                                
<th></th>                              
<th style="text-align:center;" >
    <input type="text" class="form-control totalPrice ftotal " name="totalPrice" id="totalPrice" readonly value="<?php echo $exclude_vat; ?>"></th>
<th></th>
<th style="text-align:center;" >
<input type="text" class="form-control totalVatAmt ftotal " name="totalVatAmt" id="totalVatAmt" readonly value="<?php echo $vat_amount; ?>"> </th>
<th style="text-align:center;" >
  <input type="text" class="form-control totalAmt ftotal " name="totalAmt" id="totalAmt" readonly value="<?php echo $total;?>"></th>
<th></th>

</tfoot>

<tfoot>  

<!-- <th>Discount</th>  
<th></th>
<th></th>                                
<th></th>                                
<th></th>                                
<th></th>
<th><input type="text" class="form-control discount damt " name="discount" id="discount" ></th>
<th ><input type="text" class="form-control discount dvat " name="discountVat" id="discountVat" ></th>
<th style="text-align:center;"  >
  <input type="text" class="form-control dVat ftotal " name="dVat" id="dVat" value="0">
 </th>
<th style="text-align:center;" >
  <input type="text" class="form-control dTotal ftotal " name="dTotal" id="dTotal" value="<?php echo $total;?>"></th>
<th ></th> -->

</tfoot>
</table>
<div align="center">
<input type="submit" name="submit" class="btn btn-info" onclick="callResult()" value="Insert" />
</div>
</div>  

</form>

   
<?php include 'footer.php';?>

</div>
<!-- /.main-content -->
</div>
</div>
<!--/#wrapper -->
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

$(document).on('click', '.add', function(){
count++;
var html = '';
 
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
html += '<td  width="200"><input type="text" name="line_total[]" class="form-control linetotal cond" id="lineTotal_'+count+'" readonly/></td>';
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
var Price=$('#price_'+res).val();
var Vat=$('#vat_'+res).val();
 
var result = Qty * Price;
var vatResult = (Vat / 100) * result;
var totalWithVat =result + vatResult;

$('#vatamount_'+res).val(vatResult);
$('#lineTotal_'+res).val(totalWithVat);
// $('.totaQty').html(totalWithVat);
total();

});
// $(document).on('keyup', '.discount', function(){
 
// var dprice=$('#discount').val();
// var dvat=$('#discountVat').val();
 
// var result = dprice;
// var dvatResult = (dvat/100) * result;
// var dtotalResult = Number(dprice)+Number(dvatResult);
// $('.dVat').val(dvatResult);

// $('.dTotal').val(dtotalResult);
 
// var finalTotal=Number(OTotal)-Number(dtotalResult);
// var finalVat=Number(OVamt)-Number(dvatResult);
// var finalPrice=Number(OPrice)-Number(dprice);
 
// $('.totalAmt').val(finalTotal.toFixed(2));
// $('.totalVatAmt').val(finalVat.toFixed(2));
// $('.totalPrice').val(finalPrice.toFixed(2));  

// });

$(document).on('change', '.product_id', function(){

var product_id = $(this).val();
// alert ("sdsd"+category_id);
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
// alert(desc);
$('#product_desc_'+sub_category_id).val(desc[0]);
$('#ar_product_desc_'+sub_category_id).val(desc[1]);

}
})
});

$('#insert_form').on('submit', function(event){
event.preventDefault();
// alert("d");
var error = '';



$('.issue_date').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Issue Date</p>';
return false;
}

});    

// $('.ponumber').each(function(){

// if($(this).val() == '')
// {
// error += '<p>Enter PO Number</p>';
// return false;
// }

// });     

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
// alert("asd"+form_data);
if(error == '')
{
$.ajax({
url:"action/action_update_invoice.php",
method:"POST",
data:form_data,
success:function(data)
{
if(data != ''){
window.location.href = 'print_sidebar_invoice.php?invoice_id='+data;

$('#item_table').find('tr:gt(0)').remove();
$('#error').html('<div class="alert alert-success">Item Details Saved</div>');
}
}
});

}

else
{
$('#error').html('<div class="alert alert-danger">'+error+'</div>');
}

});

});



function total()  
{  

var amt =$('#totalAmt').val(); 
var vamt=$('#totalVatAmt').val(); 
// alert(vamt);
var pamt=$('#totalPrice').val(); 
var t=0;
var v=0;
var p=0;
$('.linetotal').each(function(i,e){  
 amt =$(this).val()-0;  
t+=amt;  
});
$('.vatamount').each(function(i,e){  
 vamt =$(this).val()-0;  
v+=vamt;  
});
$('.price').each(function(i,e){  
 pamt =$(this).val()-0;  
p+=pamt;  
});
OTotal=t;
$('.totalAmt').val(t.toFixed(2));  
OVamt=v;
$('.totalvatAmt').val(v.toFixed(2));
OPrice=t-v;
$('.totalPrice').val(OPrice.toFixed(2));
}


</script>
