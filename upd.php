<?php  
$connect = mysqli_connect("localhost", "root", "", "alanzirentacar");  
if(!empty($_POST))  
{  
$output = '';  
$message = '';  
$estimation_date = mysqli_real_escape_string($connect, $_POST["estimation_date"]);  
$po_number = mysqli_real_escape_string($connect, $_POST["po_number"]);  
/*$gender = mysqli_real_escape_string($connect, $_POST["gender"]);  
$designation = mysqli_real_escape_string($connect, $_POST["designation"]);  
$age = mysqli_real_escape_string($connect, $_POST["age"]);  */
if($_POST["employee_id"] != '')  
{  
$query = "  
UPDATE estimation   
SET estimation_date='$estimation_date'  
po_number='$po_number',   
-- gender='$gender',   
-- designation = '$designation',   
-- age = '$age'   
WHERE id='".$_POST["employee_id"]."'";  
$message = 'Data Updated';  
}  
else  
{  
$query = "  
INSERT INTO estimation(estimation_date, po_number, gender, designation, age)  
VALUES('$estimation_date', '$po_number', '$gender', '$designation', '$age');  
";  
$message = 'Data Inserted';  
}  
if(mysqli_query($connect, $query))  
{  
$output .= '<label class="text-success">' . $message . '</label>';  
$select_query = "SELECT * FROM estimation ORDER BY id DESC";  
$result = mysqli_query($connect, $select_query);  
$output .= '  
<table class="table table-bordered">  
<tr>  
<th width="70%">Employee Name</th>  
<th width="15%">Edit</th>  
<th width="15%">View</th>  
</tr>  
';  
while($row = mysqli_fetch_array($result))  
{  
$output .= '  
<tr>  
<td>' . $row["name"] . '</td>  
<td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs edit_data" /></td>  
<td><input type="button" name="view" value="view" id="' . $row["id"] . '" class="btn btn-info btn-xs view_data" /></td>  
</tr>  
';  
}  
$output .= '</table>';  
}  
echo $output;  
}  
?>