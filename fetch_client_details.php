<?php

require_once 'process/dao.php';
 
 $val= listClientsById($_POST["q"]);
foreach ($val as $cval) {
	
echo "
<div clss='row'>
<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Address (EN)</label>
<div class='col-sm-9'>
<textarea class='form-control ponumber' type='text' name='en_address' readonly=''>'" . $cval['en_address']. "' 
</textarea>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label arabic'>العنوان</label>
<div class='col-sm-9'>
<textarea class='form-control ponumber arabic' type='text' name='en_address' readonly=''>'" . $cval['ar_address']. "' 
</textarea>
</div>
</div>
</div>

<div clss='row'>
<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Phone Number (EN)</label>
<div class='col-sm-9'>
<input class='form-control ponumber' type='text' name='en_address' value='" . $cval['en_phone_no']. "' readonly=''>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label arabic'>رقم الجوال</label>
<div class='col-sm-9'>
<input class='form-control ponumber arabic' type='text' name='en_address' value='" . $cval['ar_phone_no']. "' readonly=''>
</div>
</div>

<div clss='row'>
<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Client Name (EN)</label>
<div class='col-sm-9'>
<input class='form-control ponumber' type='text' name='client_name' value='" . $cval['en_firstname'].' '.$cval['en_lastname']."'>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label arabic'>اسم العميل</label>
<div class='col-sm-9'>
<input class='form-control ponumber arabic' type='text' name='ar_client_name' value='" . $cval['ar_firstname'].' '.$cval['ar_lastname']. "'>
</div>
</div>
</div>
 ";
} 
// print_r(fill_select_box())

?>