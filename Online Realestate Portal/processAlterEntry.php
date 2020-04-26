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

$sql ="SELECT * FROM SalesMaster  WHERE PlotNo = '$PlotNum'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$num = mysqli_num_rows($result); 
if($num){
	$PlotNum = $row["PlotNo"];
	$SaleValue =$row["SaleValue"];
	$SellDate =$row["DateofSale"];
	$SoldTo =$row["SoldTo"];
	$Advance =$row["Advance"];
	$Balance =$row["Balance"];
	$InstOption =$row["InstallmentOption"];
  // echo $InstOption;
	?>
	<br><br>
	<FONT FACE="Century Gothic">
		<form method="post" name="SalesForm" action="processAlterSalesEntry.php" onsubmit = "return Validate();">
			<table align=center>
				<tr>
					<td>Plot Number </td>
					<td>
						<input type="text" name="PlotNum1" readonly="readonly" VALUE="<?php echo $PlotNum; ?>">
						<input type="HIDDEN" name="PlotNum1" VALUE="<?php echo $PlotNum; ?>">
					</td>
				</tr>
				<tr>
					<td>Sale Value </td>
					<td><input type="text" name="SaleValue"  VALUE="<?php echo $SaleValue; ?>" onchange="compBalance()"></td>
				</tr>
				<tr>
					<td>Date of Sale </td>
					<td>
						<input type="text" name="SalesDate"  VALUE="<?php echo $SellDate; ?>">
						<a href="javascript:show_calendar('SalesForm.SalesDate');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;" VALUE="<?php echo $SellDate; ?>">
							<img src="Images/show-calendar.gif" width=24 height=22 border=0></a>
							(YYYY-MM-DD)
						</td>
					</tr>
					<tr>
						<td>Sold To </td>
						<td><input type="text" name="SoldTo"  VALUE="<?php echo $SoldTo; ?>"></td>
					</tr>
					<tr>
						<td>Advance</td>
						<td><input type="text" name="Advance"  VALUE="<?php echo $Advance; ?>" onchange="compBalance()"></td>
					</tr>
					<tr>
						<td>Balance</td>
						<td>
							<input type="text" name="Balance1"  VALUE="<?php echo $Balance; ?>" readonly="readonly" >
							<input type="HIDDEN" name="Balance"  VALUE="<?php echo $Balance; ?>" >
						</td>
					</tr>
					<tr>
						<td>Installment Option</td>
						<td>
							<select name="InstOpt">
								<option value="Yes" <?php $InstOption=="Yes"? "selected":""; ?>>Yes</option>
								<option value="No" <?php $InstOption=="No"? "selected":""; ?>>No</option>
							</select>
						</td>
					</tr>
					<tr>
						<td><input type="submit" Value="Modify Data"></td>
						<td><input type="reset" Value="Clear"></td>
					</tr>

				</table>
			</form>
		<?php }else{?>
			<H3 align="center">Plot details does not exist in Sales book </H3>
			<BR>
			<center>
				<A href="alterSalesEntry.php"> Back </A>
			</center>

		<?php }?>
		<script language="JavaScript" src="js/date-picker.js"></script>
		<script type="text/javascript">
			function Validate(){
				// debugger;
				var PlotNum=0,SaleValue=0,SalesDate=0,Advance=0,Balance=0;
				var InstOpt="",SoldTo="";
				var Obj = document.SalesForm;
				PlotNum = Obj.PlotNum.value;
				SaleValue = Obj.SaleValue.value;
				SoldTo = Obj.SoldTo.value;
				SalesDate = Obj.SalesDate.value;
				Advance = Obj.Advance.value;
				Balance = Obj.Balance.value;
				InstOpt = Obj.InstOpt.options[Obj.InstOpt.options.selectedIndex].text;
				if(PlotNum=="" || PlotNum==null) 
				{
					alert("Plot number is mandatory");
					Obj.PlotNum.focus();
					return false;
				}
				if(SaleValue=="" || SaleValue==null) 
				{
					alert("Sale Value is mandatory");
					Obj.SaleValue.focus();
					return false;
				}
				if(SalesDate=="" || SalesDate==null) 
				{
					alert("Date is set to Current date");
					dt = new Date();
					y = dt.getFullYear();
					m = dt.getMonth()+1;
					d = dt.getDate();
					m = (m<10)?"0"+m:m;
					d = (d<10)?"0"+d:d;
					Obj.SalesDate.value = y+"-"+m+"-"+d;
				}
				if(SoldTo=="" || SoldTo==null) 
				{
					alert("Sold to is mandatory");
					Obj.SoldTo.focus();
					return false;
				}
				if(Advance=="" || Advance==null) 
				{
					Obj.Advance.value = 0;
				}
				if(Balance=="" || Balance==null) 
				{
					Obj.Balance.value=SaleValue-Advance
				}
				if(InstOpt=="" || InstOpt==null) 
				{
					Obj.InstOpt.value = "No";
				}
				return true;
			}

			function compBalance(){
				var Obj = document.SalesForm;
				SaleValue = Obj.SaleValue.value;
				Advance = Obj.Advance.value;
				Obj.Balance1.value=SaleValue-Advance;
				Obj.Balance.value=SaleValue-Advance;
			}
		</script>
		<?php include ("includes/footer.php");?>














