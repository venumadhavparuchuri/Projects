<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');

include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$sql= "Select * from PlotDetails where Status = 'Reserved' order by PlotNo";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
if (empty($row)) {?>
	<h3><center>No records found<center></h3>
	<?php 
	exit;
}

while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$OrderBy = isset($_GET['orderby']) ? $_GET['orderby']: "null";
	$soldListArr[] = $row;
}
	$count = 0;
	
	
		

	

?>
<FORM METHOD=POST ACTION="" NAME="RPlotsForm">
<P align=right><a onclick="javascipt:window.print()" onmouseover="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a></P>
<center>
<h3 align=center> Reserved Plots </h3>
<BR><BR>
<FONT FACE="Century Gothic">
<TABLE CLASS=notebook>
	<TR class=row_title>
			<TH class=row_title>Plot Number</TH>
			<TH class=row_title>Road Number</TH>
			<TH class=row_title>Survey Number</TH>
			<TH class=row_title>Extent</TH>
			<TH class=row_title>Cost per Sq yard</TH>
			<TH class=row_title>Other Expences</TH>
			<TH class=row_title>Boundaries</TH>
			<TH class=row_title>Status</TH>
			<TH class=row_title>Facing</TH>
			<TH class=row_title>Total Cost</TH> <!-- (CostSqYard * Extent) + OtherExp -->
		</TR>
		<?php foreach($soldListArr as $item){?>
					<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
						
						<td><center><?php echo $item['PlotNo']?></center></td>
						<td><center><?php echo $item['RoadNo']?></center></td>
						<td><center><?php echo $item['SurveyNo']?></center></td>
						
						<td><center><?php echo $item['Extent']?></center></td>
						<td><center><?php echo $item['SqYardCost']?></center></td>
						<td><center><?php echo $item['OtherExpences']?></center></td>
						<td><center><?php echo $item['Boundaries']?></center></td>
						<td><center><?php echo $item['Status']?></center></td>
						<td><center><?php echo $item['Facing']?></center></td>
						<td><center><?php echo (($item['SqYardCost']*$item['Extent'])+$item['OtherExpences'])?></center></td>
					</tr>
					<?php 
					$count++;
				}?>
</TABLE>
</FORM>
<?php include ('includes/footer.php'); ?>