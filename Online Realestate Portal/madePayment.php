<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

?>
<?php
if($_SESSION['Auth']!=0){?>
<h3 align=center>Payments</h3><br><br>
	<hr>
	<h3 align=center>You are not authorized to access this page..</h3>
	<hr>
	<?php
	exit;
}

$sql ="SELECT * FROM SalesMaster  WHERE Not (Balance=0) ORDER BY PlotNo";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$makePayArr[] = $row;
}
$count = 0;

?>

<br><br><br>
<center>
	<FORM METHOD="GET" ACTION="paymentEntry.php" NAME="PaymentsForm">
		<h3 align=center> Payments</h3>
		<BR><BR>
		<FONT FACE="Century Gothic">
			<TABLE CLASS=notebook>
				<TR class=row_title>
					<TH class=row_title>Select to Pay</TH>
					<TH class=row_title>Plot Number</TH>
					<TH class=row_title>Sale Value</TH>
					<TH class=row_title>Sold On</TH>
					<TH class=row_title>Slod To</TH>
					<TH class=row_title>Advance</TH>
					<TH class=row_title>Balance</TH>
					<TH class=row_title>Installment Option</TH>
				</TR>

				<?php foreach($makePayArr as $item){?>
					<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
						
						<TH><Input type="Radio" onclick="GetValues(<?php echo $count ;?>,<?php echo $item['PlotNo']?>,<?php echo $item['SaleValue']?>,<?php echo $item['Balance']?>)"> </TH>
						<TH ><?php echo $item['PlotNo']?></TH>
						<TH ><?php echo $item['SaleValue']?></TH>
						<TH ><?php echo $item['DateofSale']?></TH>
						<TH ><?php echo $item['SoldTo']?></TH>
						<TH ><?php echo $item['Advance']?></TH>
						<TH ><?php echo $item['Balance']?></TH>
						<TH ><?php echo $item['InstallmentOption']?></TH>
					</tr>
					<?php 
					$count++;
				}?>
				<TR><TH><input type="submit" Value="Make Payment"></TH></TR>

			</TABLE>
			<INPUT TYPE=HIDDEN NAME="PlotNum" value="">
			<INPUT TYPE=HIDDEN NAME="SaleValue" value="">
			<INPUT TYPE=HIDDEN NAME="Balance" value="">
		</FORM>
	</center>
<SCRIPT LANGUAGE="JavaScript">
	<!--
		function GetValues(RowNum,PlotNum,SaleValue,Balance)
		{
	// alert(RowNum+"--"+PlotNum+"--"+SaleValue+"--"+Balance);
	var Frm = document.PaymentsForm;
	Frm.PlotNum.value=PlotNum;
	Frm.SaleValue.value=SaleValue;
	Frm.Balance.value=Balance;
}

//-->
</SCRIPT>