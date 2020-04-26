<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
	
}
include('includes/header.php');
include("includes/MultiLevelmenu.php");
include("config/conn.php");


$UserName =$_REQUEST['UserID'];
?>
<BR><BR><BR>
<P align=center><B>Delete User</B></P>
<?php 
if (empty($UserName)) {
	
}
else{
	$sql ="Delete from login where UserId='$UserName'";
	
	$result = mysqli_query($conn,$sql);
	
	if ($result=1) {
		echo "<P align=center><B>Deleted from the database sucessfully<B></P>";
	}
	else{
		echo "<P align=center><B>Error in deletion..please try again<B></P>";
	}
}
?>