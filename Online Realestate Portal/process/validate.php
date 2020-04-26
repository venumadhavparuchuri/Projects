<?php 
session_start();
include('../config/conn.php');
$username = $_POST['username'];
$pass = $_POST['password'];


$sql = "SELECT userID, Auth FROM login where userID='$username' and Password='$pass' LIMIT 1" or die(mysql_error()); 

$result = $conn->query($sql);


if($result->num_rows == 0){
	echo 0;
}else{ 
	$row = $result->fetch_assoc();
	$_SESSION['Auth'] = $row['Auth'];
	$_SESSION['UserID'] = $row['userID'];
	echo 1;
}?>