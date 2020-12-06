<?php
require_once ('process/dbh.php');
$id = $_GET['id'];

$sql = "SELECT * FROM employee  WHERE id = $id";

?>
<?php
while($row=mysqli_fetch_array($sql))
{
	$fname = $row['firstName'];
	$lname = $row['lastName'];
	$gender = $row['gender'];
	$contact = $row['contact'];
	$nid = $row['nid'];
	$department = $row['department'];
}

?>
<?php
//insert into former imployees

$insert = mysqli_query($conn,"INSERT INTO former_employees VALUES('$fname','$lname','$gender','$contact','$nid','$department') VALUES('firstName','lastName','gender','contact','nid','department')") or die(mysqli_error($conn));
include('delete.php');
?>