<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include("config/conn.php");
include ("includes/MultiLevelmenu.php");




$sql= "SELECT * FROM InstallmentDetails ORDER BY PlotNo,InstallmentNo";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$viewPaymentListArr[] = $row;
}
$count = 0;
if(empty($result))
   {
      echo "<h3 align=center>No record found</h3>";
      exit;
   }

?>

<FORM METHOD=POST ACTION="" NAME="SPlotsForm">
<center>
<P align=right><a class=title onclick="javascipt:window.print()" onmouseover="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a></P>
<h3 align=center> All Payments</h3>
<BR><BR>
<FONT FACE="Century Gothic">
<TABLE CLASS=notebook>
	
	<TR class=row_title>
			<TH class=row_title>Plot Number</TH>
			<TH class=row_title>Installment Number</TH>
			<TH class=row_title>Balance</TH>
			<TH class=row_title>Payment Made</TH>
			<TH class=row_title>Payment Date</TH>
			<TH class=row_title>Cheque Number</TH>
			<TH class=row_title>Payee Name</TH>
		</TR>

			<?php foreach($viewPaymentListArr as $item){?>
					<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
						
						<td><center><?php echo $item['PlotNo']?></center></td>
						<td><center><?php echo $item['InstallmentNo']?></center></td>
						<td><center><?php echo $item['Balance']?></center></td>
						
						<td><center><?php echo $item['PaymentMade']?></center></td>
						<td><center><?php echo $item['PaymentDate']?></center></td>
						<td><center><?php echo $item['ChequeNo']?></center></td>
						<td><center><?php echo $item['PaymentBy']?></center></td>
					</tr>
					<?php 
					$count++;
				}?>
</TABLE>
</FORM>