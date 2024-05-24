<?php
session_start();
unset($_SESSION["UserName"]);
unset($_SESSION["UserRole"]);
include_once'Includes/dbconnection.php';

if(isset($_POST['btnLogin']))
{
	$name = $_POST['txtUserName'];
	$password = $_POST['txtPassword'];
	$query = "SELECT UserName,Role FROM userdetail WHERE UserName='$name' AND
	UserPassword='$password'";
	
	$result = mysqli_query($conn,$query);
	$count = mysqli_num_rows($result);
	if($count==0)
	{
		header('Location:index.php');
	}
	else
	{
		while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
		{
			$unm = $row['UserName'];
			$role = $row['Role'];
		}
		
		$_SESSION['UserName'] = $unm;
		$_SESSION['UserRole'] = $role;
		
		header('Location:List.php');
	}
}
?>
<html>
<head>
<title>Login To AddressBook</title>
</head>
<body>
<table align="center" width="800px">
<tr>
	<td>
		<?php include'Includes\Header.html';?>
	</td>
</tr>

<tr>
	<td>
	<form method="post" action="index.php" enctype="multipart/form-data">
		<table align="center" style="border-bottom:#000000 1px solid;">
			<tr>
				<td colspan="2" style="border-bottom:#000000 1px solid;"><b>Login Here</b></td>
			</tr>
			<tr>
				<td>User Name</td>
				<td><input type="text" name="txtUserName"></td>
			</tr>
			
			<tr>
				<td>Password</td>
				<td><input type="password" name="txtPassword"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="btnLogin" value="Login">
				</td>
			</tr>
		</table>
	</form>
	</td>
</tr>
</table>
<table style="padding-top:100px;" width="800" align="center">
	<tr>
		<td>
		<?php include 'Includes/Footer.html'?>
		</td>
	</tr>
</table>
</body>
</html>