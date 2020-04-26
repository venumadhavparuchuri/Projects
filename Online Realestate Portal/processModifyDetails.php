<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}

include("config/conn.php");

$UserInfo= $_SESSION['UserID'];
$PrimarySkillSet = $_REQUEST['PrimarySkill'];
$Remarks= $_REQUEST['Remarks'];
$EmployeeNo = $_REQUEST['EmpNo'];
$employeeCity = $_REQUEST['EmpBaseCity'];

// echo $employeeCity;

$sql= "UPDATE EmpMaster set `PrimarySkillset`='".$PrimarySkillSet."',`Remarks`='".$Remarks."' WHERE `EMPNO` = $EmployeeNo";
$result = mysqli_query($conn,$sql);
if($result)
{

	$date =date("Y/m/d");

	$sql = "INSERT INTO `ActivityTracker`(`AdminUser`, `EmpModified`, `DateModified`) VALUES ('$UserInfo','$EmployeeNo','$date')";
	$result = mysqli_query($conn,$sql);
	if ($result) {
		echo "<h3 align=center>Data Successfully Updated</h3>";

	}

	

}else{
	echo "<h3 align=center>Data Not Updated</h3>";
}


?>
<LINK href="css/styles.css" type="text/css" rel="stylesheet">
<br>
<br>
<br>
<center>
	<INPUT TYPE="button" value="Close" onclick='window.close();'></center>
