<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
$id = $_GET['id'];
if(isset($_POST['delete'])){
	while($row=mysqli_fetch_array($sql)){
	$fname = $row['firstName'];
	$lname = $row['lastName'];
	$gender = $row['gender'];
	$contact = $row['contact'];
	$nid = $row['nid'];
	$department = $row['department'];
}
$insert = mysqli_query($conn, "INSERT INTO former_employees VALUES('$fname','$lname','$gender','$contact','$nid','$department') VALUES('firstName','lastName','gender','contact','nid','department')") or die(mysqli_error($conn));
	if ($insert==true) {

		$result = mysqli_query($conn, "DELETE FROM employee WHERE id=$id");		
}
header("Location: viewemp.php");?>