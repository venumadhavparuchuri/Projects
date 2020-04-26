<!-- To display Menu --Start -->

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
<h3 align=center>Modify Sales entry Information</h3>
	<hr>
	<h3 align=center>You are not authorized to access this page..</h3>
	<hr>
	<?php
	exit;
}?>
<br><br>
<h3 align=Center>Modify Sales entry Information</h3>
<h5 align=Center>Please Enter Plot number </h5>

<form method="post" name="PlotForm" action="processAlterEntry.php" onsubmit = "return Validate();">
	<table align=center>
		<tr>
			<td>Plot Number </td>
			<td><input type="text" name="PlotNum" size=5></td>
		</tr>
		<tr>
			<td><input type="submit" Value="Edit"></td>
			<td><input type="reset" Value="Clear"></td>
		</tr>
		
	</table>
</form>
<SCRIPT LANGUAGE="JavaScript">
	function Validate()
	{
		var PlotNum=0,OtherExp=0,RoadNum=0,SurNum=0,Extent=0,CostSqYard=0;
		var Boundaries="",Facing="",Status="";
		var Obj = document.PlotForm;
		PlotNum = Obj.PlotNum.value;
		if(PlotNum=="" || PlotNum==null) 
		{
			alert("Plot number is mandatory");
			Obj.PlotNum.focus();
			return false;
		}
		return true;
	}
</SCRIPT>
<?php include ("includes/footer.php");?>