<style type="text/css">
.img1{
	border-radius:50%;
	border:solid black;
}

.img1:hover{
	border-color:red;
	border-radius:45%;
}

.tr1{
	color:white;
	
}
tr{
height:30px;
}

a{
	background-color:#906723;
	color:#ffffff;
	text-decoration:none;
	padding:5px;
	border-radius:10px;
	
}
a:hover
{
	background-color:#cccccc;
	color:#000;
}
</style>
<?php
session_start();
include_once 'Includes/dbconnection.php';

$query = "SELECT UserID,UserName,Role FROM userdetail";
$result = mysqli_query($conn,$query);
?>
<html>
<head>
	<title>User List</title>
</head>
<body>
<table align="center" width="800px">
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
		<td><table><tr bgcolor='grey' class='tr1'>
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