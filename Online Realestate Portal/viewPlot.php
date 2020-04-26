<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
?>
<br><br><br>
<!-- To display Menu --End -->
<h3 align=Center>View Plot Details</h3>

<form method="post" name="PlotForm" action="processViewPlot.php" onsubmit = "return Validate();">
	<table align=center>
		<tr>
			<td>Plot Number </td>
			<td><input type="text" name="PlotNum" size=5></td>
		</tr>
		<tr>
			<td><input type="submit" Value="Get Info"></td>
			<td><input type="reset" Value="Clear"></td>
		</tr>
		
	</table>

</form>
<script language="JavaScript" type="text/javascript">
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
</script>
<?php include ("includes/footer.php");?>