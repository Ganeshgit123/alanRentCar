<?php
if (!isset($_SESSION)) {
    session_start();
}  
    $id=get("id"); 
    $status=get("status"); 

date_default_timezone_set("Asia/Kolkata");
$updated_on= date("d/m/yy H:i:s");       
require_once '../process/dao.php';
    // $user = getUserDetailsByUserId($_SESSION["user"]);

    changeUserStatus($id,$status);
    echo "success";
    //echo $uid;
    function get($input){
        return($_GET[$input]);
    }

?>
<script>
    document.location.href="../user_list.php";
</script>
