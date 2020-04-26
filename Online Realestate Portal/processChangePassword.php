<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");



   $UserID = $_POST['uid'];
   $oldPwd = $_POST['pwd'];
   $newPwd = $_POST['newpwd'];
   // echo $UserID;


$sql ="SELECT * FROM Login  WHERE Userid = '$UserID' AND Password ='$oldPwd'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if (empty($row)) {
	echo '<H3 align="center">UserName/Password Invalid Please Try again </H3>';
	echo '<center><A href="changePassword.php"> Back </A></center>';
}else{


	$sql= "UPDATE `Login` SET `Password`='".$newPwd."' WHERE `UserID` = '$UserID' AND `Password` =  '$oldPwd'";
	

$result = mysqli_query($conn,$sql);
 if($result)
   {
      echo "<h3 align=center>Data Successfully Updated</h3>";

   }else{
      echo "<h3 align=center>Data Not Updated</h3>";
   }
	
}
?>


