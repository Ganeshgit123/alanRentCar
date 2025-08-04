<?php
session_start();
include '../helpers/config.php';

if(isset($_POST["days"]))
{
// print_r($_POST["qty"]);
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

 $id=$_POST["id"];

 $query='';
 $query1='';
 $query2='';
 $updated_on=date('d-m-y H:i:s');
 
    $query1 .= 'update contract set project_name="'.$project_name.'",ar_project_name="'.$ar_project_name.'",domain_name="'.$domain_name.'",ar_domain_name="'.$ar_domain_name.'",service_provider="'.$service_provider.'",ar_service_provider="'.$ar_service_provider.'",project_details="'.$project_details.'",ar_project_details="'.$ar_project_details.'",fees_details="'.$fees_details.'",ar_fees_details="'.$ar_fees_details.'",project_deliverable="'.$project_deliverable.'",ar_project_deliverable="'.$ar_project_deliverable.'",issue_date="'.$issue_date.'",project_timeline="'.$project_timeline.'",ar_project_timeline="'.$ar_project_timeline.'",star_date="'.$star_date.'",updated_on="'.$updated_on.'" where id='.$id;
// echo $query1;

if(mysqli_query($conn, $query1))
  {

    $query2 .= 'DELETE FROM contract_details WHERE contract_id='.$id;
    // echo $query2;
  }


 if(mysqli_multi_query($conn, $query2))
  {
     // $lastid = $conn->insert_id;

 // echo "lastid  : ".$lastid;

     for($count = 0; $count<count($days); $count++)
 {
    $en_timeline_desc_clean = mysqli_real_escape_string($conn, $en_timeline_desc[$count]);
 
  $ar_timeline_desc_clean = mysqli_real_escape_string($conn, $ar_timeline_desc[$count]);

  $days_clean = mysqli_real_escape_string($conn, $days[$count]);
  // if($description_clean != '' && $qty_clean != '' && $uom_clean != '' && $price_clean != ''&& $vat_clean != ''&& $vat_amount_clean != '')
  // {
   $query .= 'INSERT INTO contract_details(contract_id,en_timeline_desc,ar_timeline_desc,days) 
    VALUES("'.$id.'","'.$en_timeline_desc_clean.'", "'.$ar_timeline_desc_clean.'", "'.$days_clean.'");'; 
  
   // echo $query;
  // }
 }
    
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