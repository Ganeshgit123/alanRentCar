<?php

require_once 'process/dao.php';
 
 $val= listUsersById($_POST["q"]);
foreach ($val as $cval) {
	
echo "

<div clss='row'>
<div class='form-group'>
<div class='col-sm-12'>
<input class='form-control user_id' type='text' id='users' name='users' value='" . $cval['en_firstname'].'&nbsp;'. $cval['en_lastname']."' readonly=''>
</div>
</div>

</div>
 ";
} 
// print_r(fill_select_box())

?>