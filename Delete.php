<?php
session_start();
include_once 'Includes/Functions.php';
if(isset($_GET["PID"]))
{
	$personID = $_GET['PID'];
	echo "id  :".$personID;
	$result = deleteEntry($personID,$conn);
	if($result)
	{
		header('location:List.php');
	}
}
?>

<html>
<head>
	<title>Delete the Data</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>
<table>
<tr>
	<td colspan="2">
		<?php include 'Includes/Header.html'?>
	</td>
</tr>
<tr>
	<td valign='top'>
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
	<td>
		<?php if($result=='Delete'){?>This data deleted successfully. Back to <a href="../AddressBook/List.php">List Page</a>
		<?php }?>
	</td>
	<tr>
		<td colspan='2'>
			<?php include 'includes/Footer.html';?>
		</td>
	</tr>
</table>
</body>
</html>