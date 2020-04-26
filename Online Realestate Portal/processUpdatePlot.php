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
$SurNum =$_POST['SurNum'];
$Extent =$_POST['Extent'];
$CostSqYard =$_POST['CostSqYard'];
$OtherExp =$_POST['OtherExp'];
$Boundaries =$_POST['Boundaries'];
$Status =$_POST['Status'];
$Facing =$_POST['Facing'];

$sql= "UPDATE `plotdetails` SET `PlotNo`='".$PlotNum."',`RoadNo`='".$RoadNum."',`SurveyNo`='".$SurNum."',`Extent`='".$Extent."',`SqYardCost`='".$CostSqYard."',`OtherExpences`='".$OtherExp."',`Boundaries`='".$Boundaries."',`Status`='".$Status."',`Facing`='".$Facing."' WHERE `PlotNo` = $PlotNum";

$result = mysqli_query($conn,$sql);
if($result)
{
	echo "<h3 align=center>Data Successfully Updated</h3>";

}else{
	echo "<h3 align=center>Data Not Updated</h3>";
}
?>
<center><a href="editPlot.php"> Back </a></center>
<?php include ("includes/footer.php");?>