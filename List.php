<?php 
session_start();
include_once 'Includes/dbconnection.php';

$query = "SELECT PersonID,Name,City,EmailID,photo FROM persondetail";

if(isset($_POST["submit"]))
{
	$city = $_POST["city"];
	if($city == '' || $city == 'All')
	{
		$query = "SELECT PersonID,Name,City,EmailID,photo FROM persondetail";
	}
	else
	{
		$query = "SELECT PersonID,Name,City,EmailID,photo FROM persondetail WHERE City = '$city'";
	}
}
$result = mysqli_query($conn,$query);
?>
<html>
<head>
<title>List of Address Book</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<table>
<tr>
	<td colspan="5">
		<?php include 'Includes\Header.html';?>
	</td>
</tr>
<form method="post">  
<tr>
	<td colspan='2'>Enter City Name:-  <input type='text' name='city' placeholder='City Name'></td>
</tr>
<tr>
	<td colspan='2'><input type='submit' name='submit'></td>
</tr>
</form>
<tr>
	<td>
		<table>
			<td valign="top">
			<?php 
				if($_SESSION['UserRole']=="Admin")
				{
					include_once 'Includes/mnuAdmin.php';
				}
				if($_SESSION['UserRole']=="User")
				{
					include_once 'Includes/mnuUser.php';
				}
			?>
			</td>
			<td>
				<div class="headers">
				<table>
				<tr bgcolor='grey' class='tr1'	>
				<td>
					Photo
				</td>
				<td>
					Name
				</td>
				<td>
					City
				</td>
				<td>
					Email id
				</td>
				<td>
					Edit Data
				</td>
				<td>
					Delete Data
				</td>
				</tr>
				</div>
			<?php 
				while($row=mysqli_fetch_assoc($result))
				{
			?>
				<tr class='entry'>
					<td>
						<img src="image/<?php echo $row['photo'];?>" height="70rem" width="70rem" class="img1">
					</td>
					<td>
						<?php echo $row['Name'];?>
					</td>
					<td>
						<?php echo $row['City'];?>
					</td>
					<td>
						<?php echo $row['EmailID'];?>
					</td>
					<td>
						<a href="Entry.php?PID=<?php echo $row['PersonID'];?>">Edit</a>
					</td>
					<td>
						<a href="Delete.php?PID=<?php echo $row['PersonID'];?>">Delete</a>
					</td>
				</tr>
			<?php 
				}
			?>
				</table>
			</td>
		</table>
	</td>
</tr>
			<tr>
				<td colspan="5">
				<?php include 'Includes/Footer.html';?>
				</td>
			</tr>
</table>
</body>
</html>