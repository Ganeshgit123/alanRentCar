 <?php
session_start();

require_once '../process/dao.php';

$file_name = $_FILES['file']['name'];
$file_tmp = $_FILES['file']['tmp_name'];
$today = date("Ymdhis");

// echo($file_name);
move_uploaded_file($file_tmp,"../upload/".time().$file_name);

$file = $_FILES['file']['name'];
$doc_name = addslashes($_FILES['file']['name']);
$document_name = addslashes(time().$_FILES['file']['name']);

$assigned_to=$_POST["assigned_to"];
$task_title=$_POST["task_title"];
$task_description=$_POST["task_description"];
$start_date=$_POST["start_date"];
$end_date=$_POST["end_date"];
 $created_by=$_SESSION["user"];  
        
date_default_timezone_set("Asia/Kolkata");
$created_on= date("d/m/yy H:i:s");

insertTaskDetails($assigned_to,$task_title,$task_description,$start_date,$end_date,$document_name,$created_by,$created_on);
    echo "sucess";

function POST($input){
    return($_GET[$input]);
}

?>
<script type="text/javascript">
window.location.href = '../assign_task.php';
</script>