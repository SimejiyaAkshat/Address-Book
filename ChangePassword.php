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
session_start();
include_once 'Includes/dbconnection.php';
$msg =  "-";
if(isset($_POST['btnChangePassword']))
{
	if($_POST['txtUserPass'] == $_POST['re-enterpassword'])
	{
		$query = "UPDATE userdetail SET userpassword='$_POST[txtUserPass]' WHERE UserName = '$_SESSION[UserName]'";
		$result = mysqli_query($conn,$query);
		if($result)
		{
			header('location:index.php');
		}
	}
	else
	{
		$msg = "Both the passwords are different!!";
	}
}
?>
<html>
<head><title>Change Password</title>
</head>
<body>
<table width='800' align='center'>
	<tr>
		<td>
			<?php include 'Includes\Header.html';?>
		</td>
	</tr>
		<td>
			<table>
				<tr>
					<td valign='top'>
					<?php
						if($_SESSION['UserRole'] == "Admin")
						{
							include_once 'Includes/mnuAdmin.php';
						}
						if($_SESSION['UserRole'] == 'User')
						{
							include_once 'Includes/mnuUser.php';
						}
					?>
					</td>
					<form method='post' enctype="multiport/form-data" action="">
					<td>
						<table>
							<tr>
								<td colspan='2'>
									<h3>Change Password</h3>
								</td>
							</tr>
							<tr>
								<td>
									New Password
								</td>
								<td>
									<input type="password" name="txtUserPass">
								</td>
							</tr>
							<tr>
								<td>
									Re-Enter Password
								</td>
								<td>
									<input type="password" name="re-enterpassword">
								</td>
							</tr>
							<tr>
								<td>
									<input type="submit" name="btnChangePassword" value="Change Password">
								</td>
								<td>
									<input type="reset" name="btnReset" value="Reset">
								</td>
							</tr>
							<tr>
								<td>
									<?php echo $msg;?>
								</td>
							</tr>
						</table>
					</td>
					</form>
				</tr>
			</table>
		</td>
	<tr>
		<td>
		<?php include 'Includes/Footer.html';?>
		</td>
	</tr>
</table>

</body>
</html>