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
<link rel="icon" href="assets/images/favicon.ico">

<title>Estimation</title>

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
</script>
</head>

<body>
<?php include 'side_header.php';
include 'top_header.php';
include 'product_ajax_for_invoice.php';
require_once 'process/dao.php';
$listClient=listClients();
$listProduct=listProducts();
?>
<!-- /.main-menu -->

<div id="wrapper">
<div class="main-content">
<div class="row small-spacing">

<!-- /.col-lg-6 col-xs-12 -->   
<!-- /.col-xs-12 -->

<form class="form-horizontal" id="insert_form">
<div class="box-content card white">
<h4 class="box-title">Estimation</h4>
<div class="card-content">

<div class="col-lg-6 col-xs-12">

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Clients / <span class="arabic">العملاء</span></label>
<div class="col-sm-9">
<select class="form-control client_id" id='client_id' name="client_id"  >
<option value="0">select</option>
<?php
foreach($listClient as $cval){?>

<option onclick="callResult();" value="<?php echo $cval['id']; ?>"><?php echo $cval['en_firstname']; ?> <?php echo $cval['en_lastname']; ?>/<?php echo $cval['ar_firstname']; ?> <?php echo $cval['ar_lastname']; ?> / <?php echo $cval['en_com_name']; ?>/<?php echo $cval['ar_com_name']; ?></option>

<?php } ?>
</select>
</div>
</div>
<!-- /.box-title -->  

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Estimation date / <span class="arabic">تاريخ التسعيرة</span></label>
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control issue_date" placeholder="mm/dd/yyyy" name="estimation_date" id="datepicker">
<span class="input-group-addon bg-primary text-white"><i class="fa fa-calendar"></i></span>
</div>
</div>
</div>

<!-- 
<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">PO Number / <span class="arabic">رقم أمر الشراء</span></label>
<div class="col-sm-9">
<input class="form-control ponumber po" type="text" name="ponumber" id="ponumber" value="">
</div>
</div> -->

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Expiry date / <span class="arabic">تاريخ الإنتهاء </span></label>
<div class="col-sm-9">
<div class="input-group">
<input type="text" class="form-control expiry_date" name="expiry_date" placeholder="mm/dd/yyyy" id="datepicker-autoclose">
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

<div class="form-group">
<label for="inp-type-1" class="col-sm-3 control-label">Payment Terms / <span class="arabic">شروط الدفع</span></label>
<div class="col-sm-9">
<textarea class="form-control payment_terms" id="payment_terms" name="payment_terms" placeholder="Payment Terms & conditions"></textarea>
</div>
</div>

</div>

<div class="col-lg-6 col-xs-12">
<!-- /.right columns -->
<div id="txtHint"></div>

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
<th>UOM / <span class="arabic_no_right">نوع العمل</span></th>
<th>Qty / <span class="arabic_no_right">الكمية</span></th>
<th>Price / <span class="arabic_no_right">السعر</span></th>
<th>VAT % / <span class="arabic_no_right">نسبة الضريبة</span></th>
<th>VAT Amount / <span class="arabic_no_right">قيمة الضريبة</span></th>
<th>Total / <span class="arabic_no_right">الإجمالي </span></th>
<th><button type="button" name="add" class="btn btn-success btn-xs add"><span class="glyphicon glyphicon-plus"></span></button></th>
</tr>
</thead>
<tbody>
<tr>
<td  width="30"><input type="text" readonly class="form-control s_no" name="s_no[]" id="s_no_1" value="1"/></td>

<td  width="200"><select name="product_id[]" class="form-control product_id" data-sub_category_id="1" id="product_id_1"><option value="">Select Category</option><?php  fill_select_box(); ?></select></td>
<td  width="200" ><input type="text" id="product_desc_1"  name="product_desc[]" class="form-control product_desc" /></td>
<td  width="200"><input type="text" id="ar_product_desc_1"  name="ar_product_desc[]" class="form-control ar_product_desc" /></td>
<td  width="100"><input type="text" name="uom[]" class="form-control uom " id="uom_1" /></td>
<td  width="100"><input type="text" name="qty[]"  id="qty_1" class="form-control qty cond" /></td>

<td  width="100"><input type="text" name="price[]" class="form-control price cond"  id="price_1" /></td>
<td  width="70"><input type="text"  name="vat[]" class="form-control vat cond"  id="vat_1"  /></td>
<td  width="100"><input type="text" name="vatamount[]" class="form-control vatamount cond" id="vatamount_1" /></td>
<td  width="200"><input type="text" name="line_total[]" class="form-control linetotal cond" id="lineTotal_1" /></td>
<td><button type="button" name="remove" class="btn btn-danger btn-xs remove"><span class="glyphicon glyphicon-minus"></span></button></td>
</tr>
</tbody>
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

<tfoot>  

  <th>Discount / <span class="arabic_no_right">التخفيض</span></th>  
  <th></th> 
  <th></th>                                
  <th></th>                                
  <th></th>                                
  <th></th>
  <th><input type="text" class="form-control discount damt " name="discount" id="discount" /></th>
  <th ><input type="text" class="form-control discount dvat " name="discountVat" id="discountVat" /></th>
  <th style="text-align:center;"><input type="text" class="form-control dVat ftotal " readonly name="dVat" id="dVat" /></th>
  <th style="text-align:center;"><input type="text" class="form-control dTotal ftotal " readonly name="dTotal" id="dTotal" /></th>
  <th ></th>
                
</tfoot>

</table>
<div align="center">
<input type="submit" name="submit" class="btn btn-info" value="Submit" />
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
<!-- ================================================== -->
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

$('#client_id').on('change',function(){
var q = $(this).val();
// alert(q);
$.ajax({
type:'POST',
url:'action/action_list_client_details.php',
data:'q='+q,
success:function(html){
// alert(html);
$('#txtHint').html(html);
}});
});


// Initialize select2
$("#client_id").select2();

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
html += '<td  width="100"><input type="text" name="uom[]" class="form-control uom " id="uom_'+count+'" /></td>';
html += '<td  width="100"><input type="text" name="qty[]"  id="qty_'+count+'" class="form-control qty cond" /></td>';

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
var Price=$('#price_'+res).val();
var Vat=$('#vat_'+res).val();
// alert(Qty);
// $('#qty_'+res).focus();
// $('#qty_'+res).select();
var result = Qty * Price; 
var vatResult = (Vat / 100) * result;
var totalWithVat =result + vatResult;

$('#vatamount_'+res).val(vatResult);
$('#lineTotal_'+res).val(totalWithVat);
// $('.totaQty').html(totalWithVat);
total();

});
$(document).on('keyup', '.discount', function(){
//   // alert("h");
var dprice=$('#discount').val();
// alert(dprice);
var dvat=$('#discountVat').val();
// alert(dvat);
var result = dprice;
var dvatResult = (dvat/100) * result;
var dtotalResult = Number(dprice)+Number(dvatResult);
$('.dVat').val(dvatResult);

$('.dTotal').val(dtotalResult);
// alert(OTotal);
// alert(OVamt);
var finalTotal=Number(OTotal)-Number(dtotalResult);
var finalVat=Number(OVamt)-Number(dvatResult);
var finalPrice=Number(finalTotal)-Number(finalVat);

// var finalPrice=Number(OPrice)-Number(dtotalResult);

// alert(Number(OTotal)+'-'+Number(dtotalResult));OPrice
$('.totalAmt').val(finalTotal.toFixed(2));
$('.totalVatAmt').val(finalVat.toFixed(2));
$('.totalPrice').val(finalPrice.toFixed(2));  

});

$(document).on('change', '.product_id', function(){

var product_id = $(this).val();
// alert ("sdsd"+product_id);
var sub_category_id = $(this).data('sub_category_id');
// alert("sdkutu"+sub_category_id);
$.ajax({
url:"product_description_for_estimation.php",
method:"POST",
data:{product_id:product_id},
success:function(data)
{
// alert(data);
var desc=data.split("++");
// var html =  data;
// $('#product_desc').val(data);
//  html += data;
$('#product_desc_'+sub_category_id).val(desc[0]);
$('#ar_product_desc_'+sub_category_id).val(desc[1]);
// alert('#product_desc'+sub_category_id);

}
})
});

$('#insert_form').on('submit', function(event){
event.preventDefault();
var error = '';

$('.product_id').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Product Name</p>';
return false;
}

});

$('.issue_date').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Estimation Date</p>';
return false;
}

});    


$('.expiry_date').each(function(){

if($(this).val() == '')
{
error += '<p>Enter Expiry Date</p>';
return false;
}

}); 


$('.client_id').each(function(){
var count = 1;
if($(this).val() == '0')
{
error += '<p>Enter Client name  </p>';
return false;
}
count = count + 1;
});
$('.payment_terms').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Payment Terms </p>';
return false;
}
count = count + 1;
});

$('.product_desc').each(function(){
var count = 1;
if($(this).val() == '')
{
error += '<p>Enter Product Description  at '+count+' Row</p>';
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
url:"action/action_insert_estimation.php",
method:"POST",
data:form_data,
success:function(data)
{
// alert(data);
if(data != ''){

   window.open('print_sidebar_estimation.php?estimation_id='+data);
   window.location.href='list_estimation.php';
//window.location.href = 'print_sidebar_estimation.php?estimation_id='+data;
	 
	 // window.location = "bill_print.php";
$('#item_table').find('tr:gt(0)').remove();
$('#error').html('<div class="alert alert-success">Item Details Saved</div>');
}
}
});
// var ids=$(this).attr('id');
// window.location = "bill_print.php";
}

else
{
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
$('.totalAmt').val(t.toFixed(2));  
OVamt=v;
$('.totalVatAmt').val(v.toFixed(2)); 
OPrice=t-v;
$('.totalPrice').val(OPrice.toFixed(2)); 
}

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

