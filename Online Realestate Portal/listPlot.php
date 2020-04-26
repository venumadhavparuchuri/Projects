<?php
session_start();
include("config/conn.php");
if(!(isset($_SESSION['UserID']))) {
	exit;

} 

$orderby= isset($_REQUEST['orderby'])? $_REQUEST['orderby']:"null";

$sql ="SELECT PlotNo,SurveyNo,Status FROM PlotDetails WHERE Status='Reserved' ORDER BY $orderby";
$plotListArr = array();
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$plotListArr[] = $row;
}
$count = 0;
?>
<!DOCTYPE html>
<html>
<head>
	<LINK href="css/styles.css" type="text/css" rel="stylesheet">

	<title>ConsolidatedReport</title>
	<script>
		function sendInfo(txtVal){
			var txt = window.opener.document.forms[0].PlotNo;
			txt.value = txtVal;
			window.close();
		}
	</script>
</head>
<body class="SC">
	<h2 align=center>Plots List</h2>
	<?php if(count($plotListArr) != 0){?>
	<form name=cons>
		<table class="notebook" align="center">

			<tr class=row_title>
				<th class=row_title><a class=title href="listPlot.php?orderby=PlotNo">PlotNo</a></th>
				<th class=row_title><a class=title href="listPlot.php?orderby=SurveyNo">SurveyNo</a></th>
				<th class=row_title><a class=title href="listPlot.php?orderby=Status">Status</a></th>
			</tr>
				<?php foreach($plotListArr as $item){?>
					<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
						<td><a href="javascript:void(0);" onclick="sendInfo('<?php echo $item['PlotNo']?>')"><?php echo $item['PlotNo']?></a></td>
						<td><?php echo $item['SurveyNo']?></td>
						<td><?php echo $item['Status']?></td>
					</tr>
					<?php 
					$count++;
				}?>
			</table>
		</form>
		<?php }else{?>
				<center>
					<br><br><br>
					<b>No Records found............</b><BR>
						<a href="index.php"> Back </a>
				</center>
				<?php }?>
	</body>
	</html>
