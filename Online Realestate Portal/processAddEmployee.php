<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");


$EMPName = $_GET['EMPName'];
$EMPno = $_GET['EMPNO'];
$EMPmail = $_GET['EmpEmailID'];
$EMPlocation = $_GET['CurrentLocation'];
$EMPjoiningDateY = $_GET['JoiningDateYYYY'];
$EMPjoiningDateM = $_GET['JoiningDateMM'];
$EMPjoiningDateD = $_GET['JoiningDateDD'];
$EMPjoiningDate = $EMPjoiningDateY."-".$EMPjoiningDateM."-".$EMPjoiningDateD;
$EMProle = $_GET['Role'];
$EMPskill = $_GET['PrimarySkillset'];
$EMPremark = $_GET['Remarks'];



$sql ="SELECT EMPNO FROM empmaster  WHERE EMPNO = '$EMPno'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$EmpNo = $row["EMPNO"];



if(is_null($EmpNo)){
	$sql = "INSERT INTO `EmpMaster`(`EMPName`, `EMPNO`, `MailID`, `CurrentLocation`, `JoiningDate`, `Role`, `PrimarySkillset`, `Remarks`) VALUES ('$EMPName', '$EMPno', '$EMPmail', '$EMPlocation', '$EMPjoiningDate', '$EMProle', '$EMPskill', '$EMPremark') ";
	$result = mysqli_query($conn,$sql);

	
	if($result ==1){
		$sql = 'INSERT INTO `activitytracker`(`AdminUser`, `EmpModified`, `DateModified`) VALUES ("$_SESSION["UserID"]","$EMPno",now())';
		// echo $result;
		$result = mysqli_query($conn,$sql);
		// echo $result;

		echo "<H3 align='center'>Details Updated Successfully </H3>
		<br><br><br><br>
		<center>
		<a href='addEmployee2.php'> Back </a>
		</center>";
	}else{
		echo "<H3 align='center'>Error in adding! there is something not right...</H3>";
	}
}else{
		echo "<H3 align='center'>Sorry Employee already exists in the databases</H3>";
	}

?><?php include ('includes/footer.php'); ?>