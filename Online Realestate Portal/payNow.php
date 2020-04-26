<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include("config/conn.php");


$PlotNo = $_POST['PlotNum'];
$SaleValue = $_POST['SaleValue'];
$Balance = $_POST['Balance'];
$Ammount = $_POST['Ammount'];
$ChequeNo = $_POST['ChequeNo'];
$PayeeName = $_POST['PayeeName'];
$InstallMent=0;
$CurrentDate = date("Y/m/d"); 
// echo $CurrentDate;
$sql ="SELECT Max(InstallmentNo) as InstallmentNo FROM InstallmentDetails WHERE PlotNo='$PlotNo'";
// echo $sql;
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if($row["InstallmentNo"] != null){
	$InstallMent = $row["InstallmentNo"];

}
else{
	$InstallMent = 0;
}
$InstallMent++;
// echo $InstallMent;
$Balance = $Balance -$Ammount;

$sql = "INSERT INTO `InstallmentDetails`(`PlotNo`, `InstallmentNo`, `Balance`, `PaymentMade`,`ChequeNo`,`PaymentBy`) VALUES ('$PlotNo','$InstallMent','$Balance','$Ammount','$ChequeNo','$PayeeName')";
$result = mysqli_query($conn,$sql);
if($result == 1){
	$updatesql = "Update SalesMaster set Balance = '$Balance' where PlotNo='$PlotNo'";
	$updateResult = mysqli_query($conn, $updatesql);

}
if($result ==1){
	echo " <br><br><center>Details Updated Successfully</center><br><br>";
	echo "<center><a href='madePayment.php'>Pay Other</a><center>";
}else{
	echo "Error in updating...please try again<br><br>";
	echo "<a href='madePayment.php'>Try Again</a>";
}
?>