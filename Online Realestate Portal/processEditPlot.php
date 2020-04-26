<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

if($_SESSION['Auth']!=0){?>
	<hr>
	<h3 align=center>You are not authorized to access this page..</h3>
	<hr>
	<?php
	exit;
}

$PlotNum = $_POST['PlotNum'];

$sql ="SELECT * FROM PlotDetails  WHERE PlotNo = '$PlotNum'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if(mysqli_num_rows($result)!=0){

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
	<br><br><br><br>
	<center>
		<h3 align=Center>Edit Plot Information</h3>
		<br><br>
		<form METHOD="POST" ACTION="processUpdatePlot.php" NAME="EPlotForm">
			<table CLASS=notebook>
				<tr>
					<th class=row_title>Plot Number</th>
					<td class="row_even">
						<input type="text" name="PlotNum1" DISABLED value=<?php echo $PlotNum; ?>>
						<input type="hidden" name="PlotNum"  value= "<?php echo $PlotNum; ?>">
					</td>
				</tr>
				<tr>
					<th class=row_title>Road Number</th>
					<td class="row_even">
						<input type="text" name="RoadNum" value= "<?php echo $RoadNum; ?>">
					</td></tr>
					<tr>
						<th class=row_title>Survey Number</th>
						<td class="row_even">
							<input type="text" name="SurNum" value= "<?php echo $SurNum; ?>">
						</td>
					</tr>
					<tr>
						<th class=row_title>Extent</th>
						<td class="row_even">
							<input type="text" name="Extent" value= "<?php echo $Extent; ?>" onchange="computeTotal()" >
						</td>
					</tr>
					<tr>
						<th class=row_title>Cost </th>
						<td class="row_even">
							<input type="text" name="CostSqYard" value= "<?php echo $CostSqYard; ?>"  onchange="computeTotal()" >per Sq yard</td></tr>
							<tr>
								<th class=row_title>Other Expences</th>
								<td class="row_even">
									<input type="text" name="OtherExp" value= "<?php echo $OtherExp; ?>"  onchange="computeTotal()" >
								</td>
							</tr>
							<tr>
								<th class=row_title>Boundaries</th>
								<td class="row_even">
									<input type="text" name="Boundaries" value= "<?php echo $Boundaries; ?>">
								</td>
							</tr>
							<tr>
								<th class=row_title>Facing</th>
								<td class="row_even">
									<select name="Facing">
										<option value="<?php echo $Facing; ?>"><?php echo $Facing; ?>
									</option>
									<option value="East">East</option>
									<option value="West">West</option>
								</select>
							</td>
						</tr>
						<tr>
							<th class=row_title>Status</th>
							<td class="row_even">
								<select name="Status">
									<option value="<?php echo $Status; ?>"><?php echo $Status; ?>"</option>
									<option value="Vacant">Vacant</option>
									<option value="Reserved">Reserved</option>
									<option value="Sold">Sold</option>
								</select>
							</td>
						</tr>
						<tr>
							<th class=row_title>Total Cost</th>
							<td class="row_even">
								<input type="text" name="TotalCost" DISABLED value="<?php echo (($CostSqYard * $Extent) + $OtherExp);?>">
							</td>
						</tr>

						<tr>
							<th class="row_even"><input type="submit" VALUE="Update"></th>
							<th class="row_even"><input type="reset" value="Reset"></th>
						</tr>
					</table>
				</form>
			</center>
			<?php }else{?>
				<br><br>
				<center><tr><th align=Center>Plot does not exists</th></tr><br><br>
				<a href="editPlot.php">Back</a></center>
			<?php }?>
			<script LANGUAGE="JavaScript">
				function computeTotal()
				{
					var FrmObj = document.EPlotForm;
					var CostSqYard = FrmObj.CostSqYard.value;
					var Extent=FrmObj.Extent.value;
					var OtherExp=FrmObj.OtherExp.value;
					var TotalCost = (CostSqYard * Extent) + parseInt(OtherExp);
					FrmObj.TotalCost.value=TotalCost;
				}
			</script>
			<?php include ("includes/footer.php");?>

