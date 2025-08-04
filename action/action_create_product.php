<?php
if (!isset($_SESSION)) {
    session_start();
}    $en_pname=get("en_pname"); 
    $en_description=get("en_description"); 
    $ar_pname=get("ar_pname");
    $ar_description=get("ar_description");   
    $created_by=$_SESSION["user"];
  // $created_by=1;
        
date_default_timezone_set("Asia/Kolkata");
$created_on= date("d/m/yy H:i:s");        
require_once '../process/dao.php';

insertProducts($en_pname,$ar_pname,$en_description,$ar_description,$created_by,$created_on);

echo "success";
//echo $uid;
function get($input){
    return($_GET[$input]);
}

?>
