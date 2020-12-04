<?php

$servername = "localhost";
$dBUsername = "root";
$dbPassword = "";
$dBName = "tea1";
$conn = mysqli_connect($servername, $dBUsername, $dbPassword, $dBName);

if (isset($_GET['delete'])){
	$id = $_GET['delete'];

	$conn->query("DELETE FROM message WHERE id=$id") or die($mysqli->error());


	header("location: ../msg.php");

}
?>