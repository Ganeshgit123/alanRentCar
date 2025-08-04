<?php
session_start();
include '../helpers/config.php';

if(isset($_POST["project_name"]))
{

    $project_name = $_POST["project_name"];
    $contract_changes = $_POST["contract_changes"];
    $ar_project_name = $_POST["ar_project_name"];
    $ar_contract_changes = $_POST["ar_contract_changes"];   
    $created_by=$_SESSION["user"];    

 $query1='';

 $created=date('d-m-y H:i:s');
 
    $query1 .= 'INSERT INTO `changes_on_contract` (project_name,contract_changes, ar_project_name,  ar_contract_changes,`created_by`, `created_on`) VALUES("'.$project_name.'","'.$contract_changes.'","'.$ar_project_name.'","'.$ar_contract_changes.'","'.$created_by.'", "'.$created.'");';

 if(mysqli_multi_query($conn, $query1))
  {
     $lastid = $conn->insert_id;

 echo $lastid;

  }
}
?>