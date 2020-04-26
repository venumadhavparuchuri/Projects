<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");

$PlotNum = $_POST["PlotNum1"];
$SaleValue =$_POST["SaleValue"];
$SellDate =$_POST["SalesDate"];
$SoldTo =$_POST["SoldTo"];
$Advance =$_POST["Advance"];
$Balance =$_POST["Balance"];
$InstOption =$_POST["InstOpt"];


$sql= "UPDATE `SalesMaster` SET `SaleValue`='".$SaleValue."',`DateOfSale`='".$SellDate."',`SoldTo`='".$SoldTo."',`Advance`='".$Advance."',`Balance`='".$Balance."',`InstallmentOption`='".$InstOption."' WHERE `PlotNo` = $PlotNum";

$result = mysqli_query($conn,$sql);
if($result)
{
	echo "<h3 align=center>Data Successfully Updated</h3>";

}else{
	echo "<h3 align=center>Data Not Updated</h3>";
}?>

<center>
	<br><br>
	<font face="Century Gothic">
		<center>
			<A href="alterSalesEntry.php"> Back </A>
		</center>
	</font>
</center>
<?php include ("includes/footer.php");?>