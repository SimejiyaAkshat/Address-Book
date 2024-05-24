<?php
	include_once'dbconnection.php';
	function addentry($name,$line1,$line2,$city,$pincode,$state,$country,$gender,$contactno,$emailid,$entryby,$t,$conn)
	{
		$lin1 = str_replace("'",".",$line1);
		$lin2 = str_replace("'",".",$line2);

		$query="INSERT INTO persondetail(Name,Line1,Line2,City,Pincode,State,Country,Gender,ContactNo,EmailID,EntryBy,photo) VALUES('$name','$lin1','$lin2','$city','$pincode','$state','$country','$gender','$contactno','$emailid','$entryby','$t')";
		$result = mysqli_query($conn,$query);
		if($result)
		{
			return "Save";
		}
		else
		{
			return "Error";
		}
		
	}
	
	function editEntry($personID,$name,$line1,$line2,$city,$pincode,$state,$country,$gender,$contactno,$emailid,$entryby,$t,$conn)
	{
		$lin1 = str_replace("'",".",$line1);
		$lin2 = str_replace("'",".",$line2);

		$query = "UPDATE persondetail SET Name='$name',Line1='$lin1',Line2='$lin2',City='$city',Pincode='$pincode',State='$state', Country='$country',Gender='$gender',ContactNo='$contactno',EmailID='$emailid',EntryBy='$entryby', photo='$t' WHERE PersonID=$personID";
		$result = mysqli_query($conn,$query);
		
		if($result)
		{
			return "Update";
		}
		else
		{
			return "Error";
		}
	}
	
	function deleteEntry($personID,$conn)
	{
		$query = "DELETE FROM persondetail WHERE PersonID='$personID'";
		
		$result = mysqli_query($conn,$query);
		
		if($result)
		{
			return "Delete";
		}
		else
		{
			return "Error";
		}
	
	}
	
	function addUser($username,$userpassword,$userrole)
	{
		$query - "INSERT INTO userdetail(UserName,UserPassword,Role) VALUES('$username','$userpassword','$userrole')";
		
		$result = mysqli_query($conn,$query);
		
		if($result)
		{
			return "Save";
		}
		else
		{
			return "Error";
		}
	}
	
	function editUser($userID,$userName,$userPassword,$userRole)
	{
		$query = "UPDATE userdetail SET UserName='$userName',UserPassword='$userPassword',Role='$role' WHERE UserID='$userID'";
		
		$result = mysqli_query($conn,$query);
		
		if($result)
		{
			return 'Update';
		}
		else
		{
			return 'Error';
		}
	}
	
	function deleteUser($userID)
	{
		$query = "DELETE FROM userdetail WHERE UserID='$userID'";
		
		$result = mysqli_query($conn,$query);
		if($result)
		{
			return "Delete";
		}
		else
		{
			return "Error";
		}
		
	}
?>