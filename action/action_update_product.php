<?php
if (!isset($_SESSION)) {
    session_start();
}  
    $id=get("id"); 
    $en_pname=get("en_pname"); 
    $en_description=get("en_description"); 
    $ar_pname=get("ar_pname");
    $ar_description=get("ar_description");

date_default_timezone_set("Asia/Kolkata");
$updated_on= date("d/m/yy H:i:s");       
require_once '../process/dao.php';
    // $user = getUserDetailsByUserId($_SESSION["user"]);

   updateProducts($id,$en_pname,$ar_pname,$en_description,$ar_description,$updated_on);
    // echo  $out."success";
    //echo $uid;
    function get($input){
        return($_GET[$input]);
    }
?>
