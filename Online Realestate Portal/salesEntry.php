<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
?>
<?php
if($_SESSION['Auth']!=0){?>
<h3 align=center>Sales entry</h3><br><br>
	<hr>
	<h3 align=center>You are not authorized to access this page..</h3>
	<hr>
	<?php
	exit;
}?>
<br><br>
<h3 align=Center>Sales Entry</h3>

<form method="post" name="SalesForm" action="processSalesEntry.php" onsubmit = "return Validate();">
	<table align=center>
		<tr>
			<td>Plot Number </td>
			<td><input type="text" name="PlotNum"></td>
		</tr>
		<tr>
			<td>Sale Value </td>
			<td><input type="text" name="SaleValue"></td>
		</tr>
		<tr>
			<td>Date of Sale </td>
			<td>
				<input type="text" name="SalesDate">
				<a href="javascript:show_calendar('SalesForm.SalesDate');" onmouseover="window.status='Date Picker';return true;" onmouseout="window.status='';return true;" VALUE="SalesForm.datebox.value">
					<img src="Images/show-calendar.gif" width=24 height=22 border=0></a>
					(YYYY-MM-DD)
				</td>
			</tr>
			<tr>
				<td>Sold To </td>
				<td><input type="text" name="SoldTo"></td>
			</tr>
			<tr>
				<td>Advance</td>
				<td><input type="text" name="Advance" onchange="compBalance()"></td>
			</tr>
			<tr>
				<td>Balance</td>
				<td><input type="text" name="Balance"  value="" readonly ></td>
			</tr>
			<tr>
				<td>Installment Option</td>
				<td>
					<select name="InstOpt">
						<option value="No">----</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</td>
			</tr>
			<tr>
				<td><input type="submit" Value="Store Data"></td>
				<td><input type="reset" Value="Clear"></td>
			</tr>

		</table>
		
	</form>
	<script type="text/javascript" src="js/date-picker.js"></script>
	<SCRIPT>
		function Validate()
		{
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
		function compBalance()
		{
			var Obj = document.SalesForm;
			SaleValue = Obj.SaleValue.value;
			Advance = Obj.Advance.value;
			Obj.Balance.value=SaleValue-Advance
		}
	</SCRIPT>
	<?php include ("includes/footer.php");?>



































