<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");


$AppartNo = $_POST['AppNo'];
$PlotNo = $_POST['PlotNo'];
$ApprtName = $_POST['Name'];
$ApprtAddress = $_POST['Address'];
$FlatsNo = $_POST['NoFlats'];



$sql = "INSERT INTO `appartmentmaster`(`AppNo`, `PlotNo`, `AppName`, `Address`, `NoFlats`) VALUES ('$AppartNo','$PlotNo','$ApprtName','$ApprtAddress','$FlatsNo')";
$result = mysqli_query($conn,$sql);

if($result)
{ 
	echo "<h3 align='center'>Add New Appartment Information</h3><br><br><br><br><h3 align='center'>Appartment details successfully updated</h3>";

}else{
	echo "<h3 align='center'>Data Not Updated</h3>";
}

?>
<center><a href="addAppartment.php"> Back </a></center>
<?php include ('includes/footer.php'); ?>