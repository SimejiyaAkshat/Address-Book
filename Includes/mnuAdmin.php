<html>
<body>
<table style="border-right:#000000 1px solid;">
<tr>
	<td bgcolor='grey'>
		<font color='white'>Login as <b><?php echo $_SESSION["UserName"]?></b></font>
	</td>
</tr>
<div class='links'>
<tr>
	<td>
		<a href="./UserList.php">User List</a>
	</td>
</tr>

<tr>
	<td>
		<a href="./CreateUser.php">Create New User</a>
	</td>
</tr>

<tr>
	<td>
		<a href="./ChangePassword.php">Change Password</a>
	</td>
</tr>

<tr>
	<td>
		<a href="./List.php">Entry List</a>
	</td>
</tr>

<tr>
	<td>
		<a href="./Entry.php">Add New Entry</a>
	</td>
</tr>

<tr>
	<td>
		<a href="./Logout.php">Log out</a>
	</td>
</tr>
</div>
</table>
</body>
</html>