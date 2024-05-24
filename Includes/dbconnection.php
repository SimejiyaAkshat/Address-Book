<?php
	$hostname='localhost';
	$database='akshat';
	$username='root';
	$password='';
	$conn = mysqli_connect($hostname,$username,$password,$database);
	
	if(!$conn)
	{
		echo "Unable to connect to Database";
	}
?>