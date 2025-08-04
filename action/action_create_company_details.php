<?php
if (!isset($_SESSION)) {
    session_start();
}    $en_name=get("en_name");
  $ar_name=get("ar_name"); 
     $en_phone_no=get("en_phone_no");
     $ar_phone_no=get("ar_phone_no");
     $en_address=get("en_address");
     $ar_address=get("ar_address"); 
   
        $email=get("email");
    $en_bank_details=get("en_bank_details");
    $en_vat=get("en_vat"); 
           $en_tax=get("en_tax");
   $created_by=$_SESSION["user"];
        
date_default_timezone_set("Asia/Kolkata");
$created_on= date("d/m/yy H:i:s");        
require_once '../process/dao.php';
                
// $user = getUserDetailsByUserId($uid);
// in_en_firstname text,in_en_lastname text,in_ar_firstname text,in_ar_lastname text,
// in_phone_no text,in_landline text,in_address text,in_ar_phone_no text,in_ar_landline text,in_ar_address text,in_email text,in_created_by Int, in_created_on text
// $branchId=$user['branchId'];
insert_company_details($en_name,$ar_name,$en_phone_no,$ar_phone_no,$en_address,$ar_address,$email,$en_bank_details,$en_vat,$en_tax,$created_by,$created_on);
echo "success";
//echo $uid;
function get($input){
    return($_GET[$input]);
}

?>
