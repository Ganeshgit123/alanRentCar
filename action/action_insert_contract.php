<?php
session_start();
include '../helpers/config.php';

if(isset($_POST["days"]))
{

 $s_no = $_POST["s_no"];
 $project_name = $_POST["project_name"];
 $domain_name = $_POST["domain_name"];
 $service_provider = $_POST["service_provider"];
 $project_details = $_POST["project_details"];
 $fees_details = $_POST["fees_details"];
 $project_deliverable = $_POST["project_deliverable"];
 $issue_date = $_POST["issue_date"];
 $project_timeline = $_POST["project_timeline"];
 $ar_project_name = $_POST["ar_project_name"];
 $ar_domain_name = $_POST["ar_domain_name"];
 $ar_service_provider = $_POST["ar_service_provider"];
 $ar_project_details = $_POST["ar_project_details"];
 $ar_fees_details = $_POST["ar_fees_details"];
 $ar_project_deliverable= $_POST["ar_project_deliverable"];
 $ar_project_timeline= $_POST["ar_project_timeline"];
  $en_timeline_desc= $_POST["en_timeline_desc"];
 $ar_timeline_desc= $_POST["ar_timeline_desc"];
  $days= $_POST["days"];
   $star_date= $_POST["star_date"];

 // $created_by=1;    
     $created_by=$_SESSION["user"];  

 $query='';
 $query1='';

 $created=date('d-m-y H:i:s');
 
    $query1 .= 'INSERT INTO `contract` (`project_name`,`ar_project_name`,`domain_name`,`ar_domain_name`,`service_provider`, `ar_service_provider`,`project_details`,`ar_project_details`, `fees_details`,`ar_fees_details`,`project_deliverable`,`ar_project_deliverable`,`issue_date`,`project_timeline`,`ar_project_timeline`,`star_date`,`created_by`, `created_on`) VALUES("'.$project_name.'","'.$ar_project_name.'","'.$domain_name.'","'.$ar_domain_name.'", "'.$service_provider.'", "'.$ar_service_provider.'", "'.$project_details.'", "'.$ar_project_details.'", "'.$fees_details.'","'.$ar_fees_details.'","'.$project_deliverable.'","'.$ar_project_deliverable.'","'.$issue_date.'","'.$project_timeline.'","'.$ar_project_timeline.'","'.$star_date.'", "'.$created_by.'", "'.$created.'");';

 if(mysqli_multi_query($conn, $query1))
  {
     $lastid = $conn->insert_id;

 // echo "lastid  : ".$lastid;

     for($count = 0; $count<count($days); $count++)
 {
    $en_timeline_desc_clean = mysqli_real_escape_string($conn, $en_timeline_desc[$count]);
 
  $ar_timeline_desc_clean = mysqli_real_escape_string($conn, $ar_timeline_desc[$count]);

  $days_clean = mysqli_real_escape_string($conn, $days[$count]);

  if($en_timeline_desc_clean != '' && $ar_timeline_desc_clean != '' && $days_clean != '')
  {
   $query .= '
   INSERT INTO contract_details(contract_id,en_timeline_desc,ar_timeline_desc,days) 
    VALUES("'.$lastid.'","'.$en_timeline_desc_clean.'", "'.$ar_timeline_desc_clean.'", "'.$days_clean.'"); 
   ';
    //echo $ar_description_clean ;
  }
 }
    
 if($query != '')
 {
  if(mysqli_multi_query($conn, $query))
  {
   echo $lastid."";
  }
  else{
   echo 'Error';
  }
 }
 else{
  echo 'All Fields are Required';
 }
  }else {
    // echo "query1".$query1;    
    // echo "query".$query;
  echo 'All Fields are Required1';
 }
}
?>