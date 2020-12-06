<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = mysqli_query($conn, "SELECT * FROM employee WHERE id = $id");
	if(@mysqli_num_rows($sql) > 0){
		$data = mysqli_fetch_array($sql);
		$migration = mysqli_query($conn, "INSERT INTO former_employees(id, firstName, lastName, gender, contact, nid, department) VALUES('".$row['id']."', '".$row['firstName']."', '".$row['lastName']."', '".$row['gender']."', '".$row['contact']."', '".$row['nid']."', '".$row['department']."')");
		if($migration){$deleted = mysqli_query($conn, "DELETE FROM employee WHERE id=$id");
			if($deleted){header('Location: viewemp.php');
			}else{header('Location: aloginwel.php');}
		}else{header('Location: aloginwel.php');}
	}else{
		header('Location: viewemp.php');
	}
}