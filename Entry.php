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

.headers{
	background-color:#778899;
	color:#f8f8ff;
	border-radius:8px;
}
</style>
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
</head>
<body>
<table width="800px" align="center">
<tr>
	<td colspan="2">
		<?php include 'Includes\Header.html'?>
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
	<td align='left'>
	<form method='post' enctype='multipart/form-data' action = 'Entry.php'>
	<table align='left'>
		<tr>
			<td class='headers'>Name</td>
			<td><input type="text" name="txtName" value="<?php echo $name;?>" size="40">
				<input type="hidden" name="personID" value="<?php echo $personID;?>">
			</td>
		</tr>
		<tr>
			<td class='headers'>
				Line-1
			</td>
			<td>
				<input type="text" name="txtLine1" value="<?php echo $line1;?>" size="40">
			</td>
		</tr>
		<tr>
			<td  class='headers'>
				Line-2
			</td>
			<td>
				<input type="text" name="txtLine2" value="<?php echo $line2;?>" size="40">
			</td>
		</tr>
		<tr>
			<td class='headers'>
				City
			</td>
			<td>
				<input type="text" name="txtCity" value="<?php echo $city;?>" size="40">
			</td>
		</tr>
		<tr>
			<td class='headers'>
				Pincode
			</td>
			<td>
				<input type="text" name="txtPincode" value="<?php echo $pincode;?>" size="40">
			</td>
		</tr>
		<tr>
			<td class='headers'>
				State
			</td>
			<td>
				<input type="text" name="txtState" value="<?php echo $state;?>" size="40">
			</td>
		</tr>
		<tr>
			<td class='headers'>
				Country
			</td>
			<td>
				<input type="text" name="txtCountry" value="<?php echo $country;?>" size="40">
			</td>
		</tr>
		<tr>
			<td class='headers'>
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
			<td class='headers'>
				Contact No.
			</td>
			<td>
				<input type="text" name="txtContactNo" value="<?php echo $contactNo;?>">
			</td>
		</tr>
		<tr>
			<td class='headers'>
				Email ID.
			</td>
			<td>
				<input type="text" name="txtEmailID" value="<?php echo $emailID;?>"/>
			</td>
		</tr>
		<tr>
			<td class='headers'>
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
	</td>
</tr>
<tr>
	<td colspan="2">
		<?php include_once 'Includes/Footer.html';?>
	</td>
</tr>

</table>
</body>
</html>