<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include("includes/MultiLevelmenu.php");
include("config/conn.php");

$UserID = $_POST['uid'];
$Password = $_POST['pwd'];
$Authentication = $_POST['auth'];


$sql ="SELECT * FROM Login  WHERE Userid = '$UserID'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if (empty($row)) {

	$sql = "INSERT INTO `Login`(`UserID`, `Password`, `Auth`) VALUES ('$UserID','$Password','$Authentication')";
$result = mysqli_query($conn,$sql);

if($result)
   {
      echo "<h3 align=center>Data Successfully Updated</h3>";
      echo '<center><A href="addUser.php"> Back </A></center>';

   }else{
      echo "<h3 align=center>Data Not Updated</h3>";
   }

	

	
}else{
	echo '<H3 align="center">user already exist </H3>';
	echo '<center><A href="addUser.php"> Back </A></center>';
}
?>