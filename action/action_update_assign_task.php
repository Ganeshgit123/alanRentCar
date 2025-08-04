<?php
if (!isset($_SESSION)) {
    session_start();
}  
    $id=get("id"); 
    $assigned_to=get("assigned_to"); 
    $task_title=get("task_title"); 
    $task_description=get("task_description");
    $start_date=get("start_date");
    $end_date=get("end_date");
    $status='P';
    // echo $id;

date_default_timezone_set("Asia/Kolkata");
$updated_on= date("d/m/yy H:i:s");       
require_once '../process/dao.php';
    // $user = getUserDetailsByUserId($_SESSION["user"]);

    updateAssingTask($id,$assigned_to,$task_title,$task_description,$start_date,$end_date,$updated_on,$status);
   
    echo 'success';
    function get($input){
        return($_GET[$input]);
    }
?>
