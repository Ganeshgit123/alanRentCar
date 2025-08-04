
<?php

//database_connection.php
require_once 'process/dao.php';
 
 $val= listProductsById($_POST["product_id"]);

foreach ($val as $cval) {
	 $output=$cval['en_description'];
	 $ar_desc=$cval['ar_description'];
	 echo $output."++".$ar_desc;
}
 

?>