<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$sql= "SELECT * FROM SalesMaster ORDER BY PlotNo";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$sellListArr[] = $row;

}
$count = 0;
if($result){
	?>
	<center>
		<FORM METHOD=POST ACTION="" NAME="SPlotsForm">
			<center></center>
			<P align=right><a class=title onClick="javascipt:window.print()" onMouseOver="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a></P>
			<h3 align=center> Sales Book</h3>
			<BR><BR>
			<FONT FACE="Century Gothic">
				<TABLE CLASS=notebook>
					<TR class=row_title>
						<TH class=row_title>Lab Service Provider Name</TH>
						<TH class=row_title>Test Name</TH>
						<TH class=row_title>Test Code</TH>
						<TH class=row_title>Test Description</TH>
						<TH class=row_title>Cost Of The Test</TH>
						<TH class=row_title>Lab@home</TH>

					</TR>

					<?php foreach($sellListArr as $item){?>
						<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
							<TH >&nbsp;</TH>
							<TH >&nbsp;</TH>
							<TH >&nbsp;</TH>
							<TH >&nbsp;</TH>
							<TH >&nbsp;</TH>
							<TH >&nbsp;</TH>
						</tr>
						<?php 
						$count++;
					}?>
				</TABLE>
			</FORM>
		</center>
	<?php }else{
		echo "No records found";
	}?>
	<?php include ("includes/footer.php");?>