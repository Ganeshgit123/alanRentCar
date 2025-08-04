<?php
if (!isset($_SESSION)) {
    session_start();
}  
    $id=get("id"); 
    $en_vname=get("en_vname"); 
    $en_address=get("en_address"); 
   // $en_contact_person=get("en_contact_person");
    $vat_id=get("vat_id");
    $ar_vname=get("ar_vname"); 
    $ar_address=get("ar_address");
  //  $ar_contact_person=get("ar_contact_person");
    $en_phone=get("en_phone");
    $en_email=get("en_email");
    $en_company_name=get("en_company_name"); 
    $ar_phone=get("ar_phone");
    $ar_company_name=get("ar_company_name");
    date_default_timezone_set("Asia/Kolkata");
    $updated_on= date("d/m/yy H:i:s");       
    require_once '../process/dao.php';
    

    updateVendors($id,$en_vname,$en_address,$en_phone,$en_email,$en_company_name,$ar_vname,$ar_address,$ar_phone,$ar_company_name,$vat_id,$updated_on);
    echo  $out;
    //echo $uid;
    function get($input){
        return($_GET[$input]);
    }
?>
