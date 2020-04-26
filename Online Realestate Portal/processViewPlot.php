<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$PlotNum = $_REQUEST['PlotNum'];

$sql ="SELECT * FROM PlotDetails  WHERE PlotNo = '$PlotNum'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if (mysqli_num_rows($result)){
	$PlotNum = $row["PlotNo"];
	$RoadNum =$row["RoadNo"];
	$SurNum =$row["SurveyNo"];
	$Extent =$row["Extent"];
	$CostSqYard =$row["SqYardCost"];
	$OtherExp =$row["OtherExpences"];
	$Boundaries =$row["Boundaries"];
	$Status =$row["Status"];
	$Facing =$row["Facing"];

	?>
	<center>
		<P align=right><a class=title onclick="javascipt:window.print()" onmouseover="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a></P>

		<h3 align=Center>Plot Information</h3>
		<BR><BR>
		<TABLE CLASS="notebook">
			<TR><TH class=row_title>Plot Number</TH><TH class="row_even"><?php echo $PlotNum; ?> </TH>
			</TR>
			<TR><TH class=row_title>Road Number</TH><TH class="row_even"> <?php echo $RoadNum; ?></TH></TR>
			<TR><TH class=row_title>Survey Number</TH><TH class="row_even"><?php echo $SurNum; ?></TH></TR>
			<TR><TH class=row_title>Extent</TH><TH class="row_even"><?php echo $Extent; ?></TH></TR>
			<TR><TH class=row_title>Cost per Sq yard</TH><TH class="row_even"><?php echo $CostSqYard; ?></TH></TR>
			<TR><TH class=row_title>Other Expences</TH><TH class="row_even"><?php echo $OtherExp; ?></TH></TR>
			<TR><TH class=row_title>Boundaries</TH><TH class="row_even"><?php echo $Boundaries; ?></TH></TR>
			<TR><TH class=row_title>Facing</TH><TH class="row_even"><?php echo $Facing; ?></TH></TR>
			<TR><TH class=row_title>Status</TH><TH class="row_even"><?php echo $Status; ?></TH></TR>
			<!-- TotalCost = (CostSqYard * Extent) + OtherExp -->
			<TR><TH class=row_title>Total Cost</TH><TH class="row_even">
				<?php echo (($CostSqYard * $Extent) + $OtherExp);?>
			</TH></TR>
		</TABLE>
		<BR><BR>
	</center>
<?php }else{?>
	<br><br><BR><BR>
	<tr><center><th>Plot does not exists</th></center></tr>
	<BR><BR>
<?php }?>
<center><A class=title href="viewPlot.php" > &lt;&lt; BACK </A></center>
<?php include ("includes/footer.php");?>