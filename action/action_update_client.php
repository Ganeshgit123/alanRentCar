<?php
if (!isset($_SESSION)) {
    session_start();
}  
    $id=get("id"); 
    $en_firstname=get("en_firstname"); 
    $en_lastname=get("en_lastname"); 
    $ar_firstname=get("ar_firstname");
    $ar_lastname=get("ar_lastname");
    $email=get("email");
    $en_phone_no=get("en_phone_no"); 
    $en_landline=get("en_landline");
    $en_address=get("en_address");
    $ar_phone_no=get("ar_phone_no");
    $ar_landline=get("ar_landline");
    $ar_address=get("ar_address");
    $en_com_name=get("en_com_name");
    $ar_com_name=get("ar_com_name");
    $tax_no=get("tax_no");
    // echo $id;

date_default_timezone_set("Asia/Kolkata");
$updated_on= date("d/m/yy H:i:s");       
require_once '../process/dao.php';
    // $user = getUserDetailsByUserId($_SESSION["user"]);

    $out=updateClients($id,$en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$en_phone_no,$en_landline,$en_address,$ar_landline,$ar_phone_no,$ar_address,$email,$en_com_name,$ar_com_name,$tax_no,$updated_on);
    // echo  updateClients($id,$en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$en_phone_no,$en_landline,$en_address,$ar_phone_no,$ar_landline,$ar_address,$email,$en_com_name,$ar_com_name,$tax_no,$updated_on);
    echo $out;
    function get($input){
        return($_GET[$input]);
    }
?>
