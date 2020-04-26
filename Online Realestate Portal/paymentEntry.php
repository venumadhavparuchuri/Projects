<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");



$PlotNo = $_REQUEST['PlotNum'];
$SaleValue =  $_REQUEST['SaleValue'];
$Balance =  $_REQUEST['Balance'];


?>

<FORM METHOD="POST" ACTION="PayNow.php" NAME="PaymentsForm" onsubmit="return Validate()">
	<center>
		<h3 align=center> Payments</h3>
		<BR><BR>
		<FONT FACE="Century Gothic">
			<TABLE width=30% align=center>
				<title>Details</title>
				<TR><TH class=row_title>Plot Number</TH><TH class=row_even><?php echo $PlotNo?></TH></TR>
				<TR><TH class=row_title>Sale Value</TH><TH class=row_even ><?php echo $SaleValue;?></TH></TR>
				<TR><TH class=row_title>Balance</TH><TH  class=row_even><?php echo $Balance?></TH></TR>
				<tr>
					<TH class=row_title>Ammount </TH>
					<td><input type="text" name="Ammount" size=30></td>
				</tr>
				<tr>
					<TH class=row_title>Cheque No. </TH>
					<td><input type="text" name="ChequeNo"  size=30></td>
				</tr>
				<tr>
					<TH class=row_title>Payee Name </TH>
					<td><input type="text" name="PayeeName"  size=30></td>
				</tr>
				<TR>
					<TH><input type="submit" Value="Pay Now"></TH>
					<TH><input type="reset" Value="Clear"></TH>
				</TR>
				<INPUT TYPE=HIDDEN NAME="PlotNum" value="<?php echo $PlotNo?>">
				<INPUT TYPE=HIDDEN NAME="SaleValue" value="<?php echo $SaleValue;?>">
				<INPUT TYPE=HIDDEN NAME="Balance" value="<?php echo $Balance?>">
			</TABLE>
		</FORM>