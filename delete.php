<?php
//including the database connection file
include("process/dbh.php");

//getting id of the data from url
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$sql = mysqli_query($conn, "SELECT * FROM employee WHERE id = $id");
	if(@mysqli_num_rows($sql) > 0){
		$array = [];
		while($data = mysqli_fetch_array($sql)){
			$array[0] = $data['id'];
			$array[1] = $data['firstName'];
			$array[2] = $data['lastName'];
			$array[3] = $data['gender'];
			$array[4] = $data['contact'];
			$array[5] = $data['nid'];
			$array[6] = $data['department'];
		}
		$migration = mysqli_query($conn, "INSERT INTO former_employees SET id='$array[0]', firstName='$array[1]', lastName='$array[2]', gender='$array[3]', contact='$array[4]', nid='$array[5]', department='$array[6]'");
		if($migration){$deleted = mysqli_query($conn, "DELETE FROM employee WHERE id=$id");
			if($deleted){header('Location: viewemp.php');
			}else{header('Location: aloginwel.php');}
		}else{header('Location: aloginwel.php');}
	}else{
		header('Location: viewemp.php');
	}
}