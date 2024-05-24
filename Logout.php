<?php
session_start();
if(isset($_SESSION['UserName']))
{
	session_destroy();
	header('Location:index.php');
}
?>