<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}  
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$sql= "SELECT * FROM SalesMaster where NOT Balance = 0 ORDER BY PlotNo";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$creditorsListArr[] = $row;
	// print_r($row);
}
$count = 0;
if(empty($creditorsListArr)){
	echo "No record found";
	exit;
}
?>
<FORM METHOD=POST ACTION="" NAME="SPlotsForm">
	<center>
		<P align=right><a class=title onclick="javascipt:window.print()" onmouseover="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a></P>
		<h3 align=center> Sales Book (Sundry Creditors)</h3>
		<BR><BR>
		<FONT FACE="Century Gothic">
			<TABLE CLASS=notebook>
				<TR class=row_title>
					<TH class=row_title>Plot Number</TH>
					<TH class=row_title>Sale Value</TH>
					<TH class=row_title>Sold On</TH>
					<TH class=row_title>Slod To</TH>
					<TH class=row_title>Advance</TH>
					<TH class=row_title>Balance</TH>
					<TH class=row_title>Installment Option</TH>
				</TR>
				<?php foreach($creditorsListArr as $item){?>
					<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
						
						
						<td><center><?php echo $item['PlotNo']?></center></td>
						<td><center><?php echo $item['SaleValue']?></center></td>
						<td><center><?php echo $item['DateofSale']?></center></td>
						<td><center><?php echo $item['SoldTo']?></center></td>
						<td><center><?php echo $item['Advance']?></center></td>
						<td><center><?php echo $item['Balance']?></center></td>
						<td><center><?php echo $item['InstallmentOption']?></center></td>
					</tr>
					<?php 
					$count++;
				}?>