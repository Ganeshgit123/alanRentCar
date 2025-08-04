<?php 
session_start();
error_reporting(0);

if (!$_SESSION["user"]) {
header('location:index.php');
} 
require_once("helpers/config.php");
// code for memberid availablity
if(!empty($_POST["uuid"])) {
	$mid=$_POST["uuid"];
	
$sql ="SELECT id FROM users WHERE uuid='".$mid."'";
// echo $sql;
$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$uuid = $row['id'];
	if ($uuid!='') {
	 	# code...
	 	echo "<span style='color:red; font-size:15px'> User id already exists .</span>";
 echo "<script>$('#submit').prop('disabled',true);</script>";
	 } else{
	 	echo "<span style='color:green; font-size:15px'> User id available for Registration .</span>";
echo "<script>$('#submit').prop('disabled',false);</script>";
	 }
// if ($result=mysqli_query($conn,$sql))
//   {
//   	$rowcount=mysqli_num_rows($result);
// mysqli_free_result($result);
// echo "<span style='color:red; font-size:15px'> User id already exists .</span>";
//  echo "<script>$('#submit').prop('disabled',true);</script>";
// } else{
	
// echo "<span style='color:green; font-size:15px'> User id available for Registration .</span>";
// echo "<script>$('#submit').prop('disabled',false);</script>";
// }
}




?>
