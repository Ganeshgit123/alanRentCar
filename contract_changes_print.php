<!DOCTYPE html>
<html lang="en" >
<head>
<meta charset="UTF-8">

<title>Contract Changes</title>
<link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700&display=swap" rel="stylesheet">

<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.2/css/bootstrap.min.css'>
<link rel="stylesheet" href="assets/styles/table.css">
<link rel="stylesheet" type="text/css" href="assets/styles/contract_changes.css">
<style type="text/css">
.page-header, .page-header-space {
height: 200px;
}

.page-footer, .page-footer-space {
height: 170px;

}

.page-footer {
position: fixed;
bottom: 0;
width: 100%;
border-top: 1px solid black; /* for demo */
background: yellow; /* for demo */
}

.page-header {
position: fixed;
top: 0mm;
width: 100%;
border-bottom: 1px solid black; /* for demo */
background: yellow; /* for demo */
}

.page {
page-break-after: always;
}

/*@page {
margin: 20mm
}*/
</style>
</head>
<body>
<!-- partial:index.partial.html -->
<div class="container">

<div class="col-12">
<?php

include_once('process/dao.php');
$contract_change_id = $_GET["id"];
// $contract_change_id =1;
$val = listContractChangesById($contract_change_id);
foreach ($val as $cval) {
?>

<table>
<thead>
<tr>
<td>
<div class="page-header-space"></div>
</td>
</tr>
</thead>
<tbody>
<tr>
<td>
<div class="page">
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h2 class="arabic" style="text-align: center;">ملحق عقد عمل مشروع</h2>
<h2>Attachment Contract</h2>
</div>
</div>
</div>
<br><br>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h2 class="arabic">هذا الملحق مخصص لعقد (<?php echo $cval['ar_project_name'];?>) بالتغييرات المدونة بالأسفل:</h2>
</div>
</div>
</div>

<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<h2 class="text-left">This Attachment is for (<?php echo $cval['project_name'];?>) with the below details:</h2>
</div>
</div>
</div>


<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<table class="table table-bordered border">
<thead>
<tr class="border">
<th width="50%" class="right_border">Changes on Contract</th>
<th width="50%" class="arab_table">تفاصيل التعديل</th>
</tr>
</thead>
<tbody>
<tr>
<td class="right_border">
	<ol>  
<?php

$input = $cval['contract_changes'];
// echo "string".$input;
      $cont = explode(',', $input);

  foreach($cont as $ccval){
    # code...
  
  ?>

    <?php echo '<li>'.$ccval.'</li>'; ?>
 
<?php } ?>
 </ol>
</td>
<td class="arab_table">
	<ol>  
<?php

$output = $cval['ar_contract_changes'];
// echo "string".$output;
      $ar_cont = explode(',', $output);

  foreach($ar_cont as $arccval){
    # code...
  
  ?>

    <?php echo '<li class="arabic">'.$arccval.'</li>'; ?>
 
<?php } ?>
 </ol>
</td>
</tr>
</tbody>

</table>
</div>
</div>
</div>

<div class="container-fluid invoice-letter" style="margin-top: 3rem;">
<div class="row">
<div class="col-5 letter-title">
<table class="table table-bordered border">
<thead>
<tr class="border">
<th colspan="2" class="arab_table">موافقة المطور على التعديلات</th>
</tr>
</thead>
<tbody>
<tr class="border">
<td width="80%" class="text-center right_border"></td>
<td class="arab_table text-center">الإسم</td>
</tr>
<tr class="border">
<td width="80%" class="text-center right_border"></td>
<td class="arab_table text-center">التاريخ</td>
</tr>
<tr class="border">
<td width="80%" class="text-center right_border"></td>
<td class="arab_table text-center">التوقيع</td>
</tr>
</tbody>

</table>
</div>
<div class="col-2"></div>
<div class="col-5 letter-title1">
<table class="table table-bordered border">
<thead>
<tr class="border">
<th colspan="2" class="arab_table">موافقة صاحب المشروع</th>
</tr>
</thead>
<tbody>
<tr class="border">
<td width="80%" class="text-center right_border"></td>
<td class="arab_table text-center">الإسم</td>
</tr>
<tr class="border">
<td width="80%" class="text-center right_border"></td>
<td class="arab_table text-center">التاريخ</td>
</tr>
<tr class="border">
<td width="80%" class="text-center right_border"></td>
<td class="arab_table text-center">التوقيع</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</td>
</tr>
</tbody>

<tfoot>
<tr>
<td>
<div class="page-footer-space"></div>
</td>
</tr>
</tfoot>

</table>
<?php } ?>
</div>
</div>
</body>
<script type="text/javascript">
window.print();
</script>
</html>

