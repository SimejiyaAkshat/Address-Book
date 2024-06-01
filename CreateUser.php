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
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'Includes/Header.html';?>

	<div class="content-main-container">
			<div class="content-container">
				<div class="data-container">
					<div class="data-left-con">
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
					</div>
					<form method='post' name="" action="CreateUser.php" enctype="multiport/form-data">
					<td align='left'>
					<table align='left' class="createuserForm">
					<tr>
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
				</div>
			</div>
	</div>

<?php include 'Includes/Footer.html';?>

</table>
</body>
</html>