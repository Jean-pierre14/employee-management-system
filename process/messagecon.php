<?php 
require_once('dbh.php'); 

	$name = $_POST['name'];
	$email = $_POST['email'];
	$message = $_POST['message'];

	$conn->query("INSERT INTO message (name,email,message) VALUES('$name','$email','$message')") or die($conn->error);

	echo ("<SCRIPT LANGUAGE='JavaScript'>
    	window.alert('message recieved')
    	window.location.href='..//contact.html';
    	</SCRIPT>");
	/*
	header('location:..//contact.html');
	*/



?>