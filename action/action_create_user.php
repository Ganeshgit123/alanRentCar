<?php
if (!isset($_SESSION)) {
    session_start();
}    $en_firstname=post("en_firstname");
$uuid=post("uuid"); 
    $en_lastname=post("en_lastname"); 
    $email=post("email");
    $upassword=post("upassword");
    $user_level=post("user_level"); 
    $ar_firstname=post("ar_firstname");
    $ar_lastname=post("ar_lastname");    
    $created_by=$_SESSION["user"];
        
date_default_timezone_set("Asia/Kolkata");
$created_on= date("d/m/yy H:i:s");        
require_once '../process/dao.php';

insertUsers($uuid,$en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$email,$upassword,$user_level,$created_by,$created_on);
echo "success";
//echo $uid;
function post($input){
    return($_POST[$input]);
}

?>
