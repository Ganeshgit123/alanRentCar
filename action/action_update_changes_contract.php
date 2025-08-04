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

 $id=$_POST["id"];

 $query='';
 $updated_on=date('d-m-y H:i:s');
 
    $query .= 'update changes_on_contract set project_name="'.$project_name.'",contract_changes="'.$contract_changes.'",ar_project_name="'.$ar_project_name.'",ar_contract_changes="'.$ar_contract_changes.'",updated_on="'.$updated_on.'" where id='.$id;
// echo $query1;
  
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
   echo $id; 
     // echo 'success';
  }
  else{
   // echo 'Error'.$query;
  }
 }
 
}
?>