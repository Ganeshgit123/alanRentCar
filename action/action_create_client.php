<?php
if (!isset($_SESSION)) {
    session_start();
}    
$en_firstname=get("en_firstname"); 
    $en_lastname=get("en_lastname"); 
    $email=get("email");
    $en_phone_no=get("en_phone_no");
    $en_landline=get("en_landline"); 
    $en_address=get("en_address");
    $ar_firstname=get("ar_firstname");
    $ar_lastname=get("ar_lastname"); 
    $ar_phone_no=get("ar_phone_no"); 
    $ar_landline=get("ar_landline"); 
    $ar_address=get("ar_address");
    $en_com_name=get("en_com_name");
    $ar_com_name=get("ar_com_name");
    $tax_no=get("tax_no");
   
   // $created_by=1;
        
date_default_timezone_set("Asia/Kolkata");
$created_on= date("d/m/yy H:i:s");        
require_once '../process/dao.php';

 $created_by=$_SESSION["user"];
                
insertClients($en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$en_phone_no,$en_landline,$en_address,$ar_phone_no,$ar_landline,$ar_address,$email,$en_com_name,$ar_com_name,$tax_no,$created_by,$created_on);
// $en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$en_phone_no,$en_landline,$en_address,$ar_phone_no,$ar_landline,$ar_address,$email,$en_com_name,$ar_com_name,$tax_no,$created_by,$created_on

// echo insertClients($en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$en_phone_no,$en_landline,$en_address,$ar_phone_no,$ar_landline,$ar_address,$email,$en_com_name,$ar_com_name,$tax_no,$created_by,$created_on);

echo "success";
//echo $uid;
function get($input){
    return($_GET[$input]);
}

?>
