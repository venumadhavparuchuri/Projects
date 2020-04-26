<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$PlotNum = $_POST['PlotNum'];
$RoadNum = $_POST['RoadNum'];
$SurNum = $_POST['SurNum'];
$CostSqYard = $_POST['CostSqYard'];
$OtherExp = $_POST['OtherExp'];
$Extent = $_POST['Extent'];
$Boundaries = $_POST['Boundaries'];
$Facing = $_POST['Facing'];
$Status = $_POST['Status'];
// echo $PlotNum;
$sql = "INSERT INTO `plotdetails`(`PlotNo`, `RoadNo`, `SurveyNo`, `Extent`, `SqYardCost`, `OtherExpences`, `Boundaries`, `Status`, `Facing`) VALUES ('$PlotNum', '$RoadNum', '$SurNum', '$Extent', '$CostSqYard', '$OtherExp', '$Boundaries', '$Status', '$Facing') ";
// echo $sql;
$result = mysqli_query($conn,$sql);

// print_r($result);
if($result) {
	?>
	<br>
	<H3 align="center">Plot details added successfully </H3>
	<br>
	<center>
		<a href="addPlot.php"> Back </a>
	</center>
	<?php
}else {
	?>
	<br>
	<H3 align="center">Error in updating..... </H3>
	<BR>
	<center>
		<a href="AddPlot.php"> Back </a>
	</center>

<?php }
?>
<?php include ("includes/footer.php");?>