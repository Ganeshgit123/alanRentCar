
<?php

//database_connection.php
require_once 'process/dao.php';
// $connect = new PDO("mysql:host=localhost; dbname=alanzirentacar;", "root", "");
// $_POST["category_id"]

 $val= listProductsById($_POST["product_id"]);

foreach ($val as $cval) {
	 $output=$cval['en_description'].'++'.$cval['ar_description'];
	 echo $output;
}
 
// print_r(fill_select_box())

?>