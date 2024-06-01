<?php
session_start();
$name = "";
$line1 = "";
$line2 = "";
$city = "";
$pincode = "";
$state = "";
$country = "";
$gender = "";
$contactNo = "";
$emailID = "";
$personID = "";

include_once 'Includes/Functions.php';
if(isset($_GET['PID']))
{
	$personID = $_GET["PID"];
	$query = "SELECT Name,Line1,Line2,City,Pincode,State,Country,Gender,ContactNo,EmailID FROM persondetail WHERE PersonID=$personID";
	
	$result = mysqli_query($conn,$query);
	
	while($row=mysqli_fetch_array($result,MYSQLI_BOTH))
	{
		$name = $row['Name'];
		$line1 = $row['Line1'];
		$line2 = $row['Line2'];
		$city = $row['City'];
		$pincode = $row['Pincode'];
		$state = $row['State'];
		$country = $row['Country'];
		$gender = $row['Gender'];
		$contactNo = $row['ContactNo'];
		$emailID = $row['EmailID'];
	}
}
if(isset($_POST['btnSave']))
{
	if($_POST['personID']!='')
	{
		$t = $_FILES['img']['name'];
		move_uploaded_file($_FILES["img"]["tmp_name"],"image/".$_FILES["img"]["name"]);
		$result = editEntry($_POST['personID'],$_POST['txtName'],$_POST['txtLine1'],$_POST['txtLine2'],$_POST['txtCity'],$_POST['txtPincode'],$_POST['txtState'],$_POST['txtCountry'],$_POST['cmbGender'],$_POST['txtContactNo'],$_POST['txtEmailID'],
		$_SESSION['UserName'],$t,$conn);
		header('Location:List.php');
	}
	else
	{
		$t = $_FILES['img']['name'];
		move_uploaded_file($_FILES["img"]["tmp_name"],"image/".$_FILES["img"]["name"]);
		$result = addentry($_POST['txtName'],$_POST['txtLine1'],$_POST['txtLine2'],$_POST['txtCity'],$_POST['txtPincode'],$_POST['txtState'],$_POST['txtCountry'],$_POST['cmbGender'],$_POST['txtContactNo'],$_POST['txtEmailID'],$_SESSION['UserName'],$t,$conn);
		
		header('location:List.php');
	}
}

?>
<html>
<head>
	<title>Add New Entry</title>
	<link rel="stylesheet" href="styles.css">
</head>
<body>

<?php include 'Includes\Header.html'?>

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
					<form method='post' enctype='multipart/form-data' action = 'Entry.php'>
					<table class="createuserForm">
						<tr>
							<td>Name</td>
							<td><input type="text" name="txtName" value="<?php echo $name;?>" size="40">
								<input type="hidden" name="personID" value="<?php echo $personID;?>">
							</td>
						</tr>
						<tr>
							<td>
								Line-1
							</td>
							<td>
								<input type="text" name="txtLine1" value="<?php echo $line1;?>" size="40">
							</td>
						</tr>
						<tr>
							<td>
								Line-2
							</td>
							<td>
								<input type="text" name="txtLine2" value="<?php echo $line2;?>" size="40">
							</td>
						</tr>
						<tr>
							<td>
								City
							</td>
							<td>
								<input type="text" name="txtCity" value="<?php echo $city;?>" size="40">
							</td>
						</tr>
						<tr>
							<td>
								Pincode
							</td>
							<td>
								<input type="text" name="txtPincode" value="<?php echo $pincode;?>" size="40">
							</td>
						</tr>
						<tr>
							<td>
								State
							</td>
							<td>
								<input type="text" name="txtState" value="<?php echo $state;?>" size="40">
							</td>
						</tr>
						<tr>
							<td>
								Country
							</td>
							<td>
								<input type="text" name="txtCountry" value="<?php echo $country;?>" size="40">
							</td>
						</tr>
						<tr>
							<td>
								Gender
							</td>
							<td>
								<select name='cmbGender'>
									<option <?php if($gender == 'Male'){echo 'Selected="Selected"';}?>>Male</option>
									<option <?php if($gender == 'Female'){echo 'Selected="Selected"';}?>>Female</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>
								Contact No.
							</td>
							<td>
								<input type="text" name="txtContactNo" value="<?php echo $contactNo;?>">
							</td>
						</tr>
						<tr>
							<td>
								Email ID.
							</td>
							<td>
								<input type="text" name="txtEmailID" value="<?php echo $emailID;?>"/>
							</td>
						</tr>
						<tr>
							<td>
								Upload a file
							</td>
							<td>
								<input type="file" name="img">
							</td>
						</tr>
						<tr>
							<td align='center'>
								<input type="submit" name="btnSave" value="Save">
								<input type="reset" name="btnReser" value="Reset">
							</td>
						</tr>
						</table>
						</form>

			</div>
		</div>
	</div>
<?php include_once 'Includes/Footer.html';?>

</body>
</html>