<?php

require_once 'process/dao.php';
 
 $val= listVendorsById($_POST["q"]);
foreach ($val as $cval) {
	
echo "
<div clss='row'>
<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label'>Address</label>
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
<label for='inp-type-1' class='col-sm-3 control-label'>Phone No.</label>
<div class='col-sm-9'>
<input class='form-control ponumber' type='text' name='en_address' value='" . $cval['en_phone']. "' readonly=''>
</div>
</div>

<div class='form-group'>
<label for='inp-type-1' class='col-sm-3 control-label arabic'>رقم الهاتف</label>
<div class='col-sm-9'>
<input class='form-control ponumber arabic' type='text' name='en_address' value='" . $cval['ar_phone']. "' readonly=''>
</div>
</div>
</div>
 ";
} 
// print_r(fill_select_box())

?>