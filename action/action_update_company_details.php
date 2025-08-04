<?php
if (!isset($_SESSION)) {
    session_start();
}  
    $id=get("id"); 
    $en_name=get("en_name"); 
    $ar_name=get("ar_name");
    $en_phone_no=get("en_phone_no");
    $ar_phone_no=get("ar_phone_no"); 
    $en_address=get("en_address");
     $ar_address=get("ar_address");
    $email=get("email");
    $en_bank_details=get("en_bank_details");
    $en_vat=get("en_vat");
    // $en_tax=get("en_tax");

date_default_timezone_set("Asia/Kolkata");
$updated_on= date("d/m/yy H:i:s");       
require_once '../process/dao.php';
    // $user = getUserDetailsByUserId($_SESSION["user"]);

    $out=updateCompanyDetails($id,$en_name,$ar_name,$en_phone_no,$ar_phone_no,$en_address,$ar_address,$email,$en_bank_details,$en_vat);
    echo $out;
    // echo  $out."success";
    //echo $uid;
    function get($input){
        return($_GET[$input]);
    }
?>
