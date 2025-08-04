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
    $upassword=get("upassword");
    $user_level=get("user_level");

date_default_timezone_set("Asia/Kolkata");
$updated_on= date("d/m/yy H:i:s");       
require_once '../process/dao.php';
    // $user = getUserDetailsByUserId($_SESSION["user"]);
    if ($upassword=='') {
        # code...
         updateUsers($id,$en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$email,$upassword,$user_level,$updated_on);
         echo "success";
    }else{
    updateUsers($id,$en_firstname,$en_lastname,$ar_firstname,$ar_lastname,$email,$upassword,$user_level,$updated_on);

    echo "success";
}
    //echo $uid;
    function get($input){
        return($_GET[$input]);
    }

?>
<script>
    document.location.href="../user_list.php";
</script>
