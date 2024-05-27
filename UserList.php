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

<?php include 'Includes\Header.html';?>

	<div class="content-main-container">
		<div class="content-container">
			<div class="data-container">
				<div class="data-left-con">
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
				</div>
				<div class="data-right-con">
					<div class="headers">
					<table>
						<tr class="headers-tr">
							<td>Name</td>
							<td>Role</td>
							<td>Edit Data</td>
							<td>Delete Data</td>
						</tr>
					</div>
						<?php
							while($row = mysqli_fetch_array($result,MYSQLI_BOTH))
							{
						?>
						<tr  class='entry'>
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
				</div>
			</div>
		</div>
	</div>
	<?php include 'Includes\Footer.html';?>
</body>
</html>