<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$PlotNum = $_POST['PlotNum'];
$SaleValue = $_POST['SaleValue'];
$SalesDate = $_POST['SalesDate'];
$SoldTo = $_POST['SoldTo'];
$Advance = $_POST['Advance'];
$Balance = $_POST['Balance'];
$InstOpt = $_POST['InstOpt'];
$Res =0;

// echo $PlotNum;

$sql = "SELECT PlotNo,Status FROM PlotDetails WHERE Status Not Like 'Sold' and PlotNo = '$PlotNum'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$PlotNum = $row["PlotNo"];
$Status = $row["Status"];
// echo "Status: ".$Status;
if (!empty($Status) && $Status != "Sold") {
	$sql1 ="INSERT INTO `salesmaster`(`PlotNo`, `SaleValue`, `DateofSale`, `SoldTo`, `Advance`, `Balance`, `InstallmentOption`) VALUES ('$PlotNum','$SaleValue','$SalesDate','$SoldTo','$Advance','$Balance','$InstOpt')";

	$result = mysqli_query($conn,$sql1);
	$sql2= "UPDATE `plotdetails` SET `Status`='Sold' WHERE `PlotNo` = $PlotNum";
	$result = mysqli_query($conn,$sql2);
	?>
	<H3 align="center">Entry added successfully </H3>
	<?php
	
}
else if(empty($Status)){
	?>

	<H3 align="center">Plot is already Sold</H3>
	<?php
}else{?>
	<H3 align="center">Error in updating..... </H3>
	<?php

}

?>
<center>
	<A href="home.php"> Back </A>
</center>