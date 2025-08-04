
<?php

//database_connection.php
require_once '../process/dao.php';
// $connect = new PDO("mysql:host=localhost; dbname=alanzirentacar;", "root", "");

function fill_select_box()
{
 $val= listProducts();

foreach ($val as $cval) {
	 $output='<option value="'.$cval['id'].'">'.$cval['en_pname'].'</option>';
	 echo $output;
}
 return $output;
}
// print_r(fill_select_box())

?>