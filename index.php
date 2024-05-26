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
<link rel="stylesheet" href="styles.css">
</head>
<body>

	<?php include'Includes\Header.html';?>
	<div class="login-form-outer">
	<form method="post" action="index.php" enctype="multipart/form-data" class="login-form">
		<table>
			<tr>
				<td colspan="2"><b>Login Here</b></td>
			</tr>
			<tr>
				<td>User Name :</td>
				<td><input type="text" name="txtUserName"></td>
			</tr>
			
			<tr>
				<td>Password :</td>
				<td><input type="password" name="txtPassword"></td>
			</tr>
			
			<tr>
				<td colspan="2" align="right">
					<input type="submit" name="btnLogin" value="Login" class="login-button">
				</td>
			</tr>
		</table>
	</form>
	</div>
<?php include 'Includes/Footer.html'?>
</body>
</html>