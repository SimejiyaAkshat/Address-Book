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

.td{
	background-color:grey;
	color:white;
}
</style>
<?php
include_once 'Includes/dbconnection.php';
session_start();
if(isset($_POST['btnSave']))
{
	if($_POST['txtUserName'] != "" || $_POST['txtPassword'] == "")
	{
		$query = "INSERT INTO userdetail(UserName,UserPassword,Role) VALUES ('$_POST[txtUserName]','$_POST[txtPassword]','$_POST[cmbRole]')";
		echo $query ;
		$result = mysqli_query($conn,$query);
		
		if($result)
		{
			header('Location:UserList.php');
		}
		else
		{
			header('Location:CreateUser.php');
		}
	}
}
?>
<html>
<head>
	<title>Create New User</title>
</head>
<body>
<table width='800px' align='center'>
<tr>
	<td colspan='2'>
		<?php include 'Includes/Header.html';?>
	</td>
</tr>
<tr>
	<td>
	<?php
	if($_SESSION['UserRole'] == 'Admin')
	{
		include_once 'Includes/mnuAdmin.php';
	}
	if($_SESSION['UserRole'] == 'User')
	{
		include_once 'Includes/mnuUser.php';
	}
	?>
	</td>
	<form method='post' name="" action="CreateUser.php" enctype="multiport/form-data">
	<td align='left'>
	<table align='left'>
	<tr bgcolor='grey' class='tr1'>
	<td colspan='2'>
		Login Information
	</td>
	</tr>
	<tr>
		<td>
			User Name:
		</td>
		<td>
			<input type="text" name="txtUserName" autocomplete='off'>
		</td>
	</tr>
	<tr>
		<td>
			Password:
		</td>
		<td>
			<input type="password" name="txtPassword" autocomplete='off'>
		</td>
	</tr>
	<tr>
		<td>
			User Role:
		</td>
		<td>
			<select name="cmbRole">
				<option>Admin</option>
				<option>User</option>
			</select>
		</td>
	</tr>
	<tr>
		<td colspan='2' align='left'>
		<input type='submit' name='btnSave' value='Save'>
		<input type='reset' name='btnReset' value='Reset'>
		</td>
	</tr>
	</table>
	</td>
	</form>
</tr>
<tr>
	<td colspan='2'>
	<?php include 'Includes/Footer.html';?>
	</td>
</tr>

</table>
</body>
</html>