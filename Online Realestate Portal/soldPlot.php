<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");



$sql= "Select * from PlotDetails where Status = 'Sold' order by PlotNo";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$soldListArr[] = $row;
}
	$count = 0;
?>
<FORM METHOD=POST ACTION="" NAME="SPlotsForm">
<center>
<P align=right><a class=title onclick="javascipt:window.print()" onmouseover="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a></P>
<h3 align=center> Sold Plots </h3>
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