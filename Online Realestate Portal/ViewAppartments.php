<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$sql= "SELECT * FROM AppartmentMaster ORDER BY AppNo,PlotNo";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$plotListArr[] = $row;
}
$count = 0;

if($result){ ?>
	<FORM METHOD="POST" NAME="RPlotsForm">
		<P align=right><a onclick="javascipt:window.print()" onmouseover="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a>
		</P>
		<center>
			<h3 align=center> Consolidated report of Appartments  </h3>
			<br><br>
			<FONT FACE="Century Gothic">
				<TABLE CLASS=notebook>
					<TR class=row_title>
						<TH class=row_title>Appartment Number</TH>
						<TH class=row_title>Plot Number</TH>
						<TH class=row_title>Name</TH>
						<TH class=row_title>Address</TH>
						<TH class=row_title>Number of Flats</TH>
					</TR>
					<?php foreach($plotListArr as $item){?>
						<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
							<td><center><?php echo $item['AppNo']?></center></td>
							<td><center><a href="processViewPlot.php?PlotNum=<?php echo $item['PlotNo']?>" ><?php echo $item['PlotNo']?></a></center></td>
							<td><center><?php echo $item['AppName']?></center></td>
							<td><center><?php echo $item['Address']?></center></td>
							<td><center><?php echo $item['NoFlats']?></center></td>
						</tr>
						<?php 
						$count++;
					}?>

				</TABLE>
			</FONT>
		</center>
	</FORM>
<?php }else{
	echo "<h3 align=center>Data Not Updated</h3>";
}?>

<?php include ("includes/footer.php");?>