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
<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'Includes\Header.html';?>


	<div class="content-main-container">
		<div class="content-container">
			<div class="data-container">
				<div class="data-left-con">
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
				</div>
					<form method='post' enctype="multiport/form-data" action="">
						<table class="createuserForm">
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
					</form>
			</div>
		</div>
	</div>
<?php include 'Includes/Footer.html';?>

</body>
</html>