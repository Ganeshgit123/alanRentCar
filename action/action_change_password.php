<?php
if (!isset($_SESSION)) {
    session_start();
}  
     $id = $_SESSION["user"];
     // echo $id;
    $newpassword=post("newpassword");
    date_default_timezone_set("Asia/Kolkata");
    $updated_on= date("d/m/yy H:i:s");       
    require_once '../process/dao.php';
    

    $out=changePassword($id,$newpassword);
    echo $out;
    //echo $uid;
    function post($input){
        return($_POST[$input]);
    }
?>
