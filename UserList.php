<?php
session_start();
include_once 'Includes/dbconnection.php';

$query = "SELECT UserID,UserName,Role FROM userdetail";
$result = mysqli_query($conn,$query);
?>
<html>
<head>
	<title>User List</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<table>
<tr>
	<td colspan="5">
		<?php include 'Includes\Header.html';?>
	</td>
</tr>
<tr>
	<td><table>
		<td valign="top"> 
		<?php
			if($_SESSION["UserRole"] == "Admin")
			{
				include_once 'Includes/mnuAdmin.php';
			}
			if($_SESSION['UserRole'] == "User")
			{
				include_once 'Includes/mnuUser.php';
			}
		?>
		</td>
		<td><table><tr>
			<td>Name</td>
			<td>Role</td>
			<td>Edit Data</td>
			<td>Delete Data</td>
		</tr>
	<?php
		while($row = mysqli_fetch_array($result,MYSQLI_BOTH))
		{
	?>
	<tr>
		<td>
		<?php echo $row['UserName'];?>
		</td>
		<td>
		<?php echo $row['Role'];?>
		</td>
		<td>
		Edit
		</td>
		<td>
		Delete
		</td>
	</tr>
	<?php 
		}
	?>
	</table>
	</td>
	</tr>
	<tr>
		<td colspan="5">
		<?php include 'Includes\Footer.html';?>
		</td>
	</tr>
	</table>
</body>
</html>