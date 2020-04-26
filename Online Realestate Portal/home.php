<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	header("location:login.php");
	exit;
}

?>
<?php
include ("includes/header.php");
include ("includes/MultiLevelmenu.php");
?>
<font color="#ff0080">

<br></font>
<Title>Reports</Title>
<font face="Times New Roman" color="#ff0080" >
<center>
<h2 class="report" style="margin-top:80px;">Welcome <u><?php echo $_SESSION['UserID']?></u> to Realtors Pro V1.0</h2><br>
</center>
</font>
<p align="right">
<font color="#ff0080"><a href="changePassword.php">Change Password </a><br></font>
<br>
<?php if($_SESSION['Auth']==0){?>
	<font color="#ff0080"><a href="addUser.php">Add new user </a><br><br>
	<a href="viewUsers.php">View users </a></font> 
	<font color="#ff0080"><br><br><a href="deleteUsers.php">Delete users </a></font> 
	<font color="#ff0080"><br>
	<?php } ?> 
	</p>
	<?php include ("includes/footer.php");?>