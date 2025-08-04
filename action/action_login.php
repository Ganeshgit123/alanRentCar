<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
$username = get("username");
$upassword = get("password");
// echo "jjdsh".$upassword;
require_once '../process/dao.php';
$exists = checkLogin($username, $upassword);
// echo $exists;

if ($exists > 0) {
	$_SESSION["user"] = $exists;

	$user = getUserDetailsById($_SESSION["user"]);
	foreach ($user as $val) {
		$_SESSION["user_level"] = $val['user_level'];
		// $_SESSION["userlevel"]=$ulevel;
	}
	echo "success";
	// echo '//'.$_SESSION["user"];
} else {

	echo "failure";
}
function get($input)
{
	return ($_GET[$input]);
}
