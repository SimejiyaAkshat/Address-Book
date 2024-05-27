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

	<?php include 'Includes\Header.html';?>
	<div class="content-main-container">
		<div class="content-container">
		<div class="search-form">
		<form method="post">  
			<div>
				<span>Enter City Name:-  </span><input type='text' name='city' placeholder='City Name'>
				<div><input type='submit' name='submit'></div>
			</div>
		</form>
		</div>
		<div class="data-container">
					<div class="data-left-con">
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
					</div>
					<div class="data-right-con">
						<div class="headers">
						<table>
						<tr class="headers-tr">
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
								<div  class="profile-image">
									<img src="image/<?php echo $row['photo'];?>" height="70rem" width="70rem" class="img1">
								</div>
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
				</div>
		</div>
		</div>
	</div>
	</div>
	<?php include 'Includes/Footer.html';?>
</body>
</html>