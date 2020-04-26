<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");
include("config/conn.php");


$sql ="SELECT * FROM Login  order by `UserID`";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$userListArr[] = $row;
	// print_r($row);
}
$count = 0;
?>
<BR><BR>
<h3 align=center>Users</h3>
<table width="800" height="300" background="Images/i11.jpg" align="center">
<tr>
<td>
<table align="center" width="60%">
<tr class=row_title>
<th align="left">UserID</th><th align="left">Auth</th>
</tr>
<?php foreach($userListArr as $item){?>
	<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
	<td><?php echo $item['UserID']?></td>
	<td><?php echo $item['Auth']?></td>
	</tr>
	<?php 
	$count++;
}?>
</table>
</td>
</tr>
</table>
<?php include ('includes/footer.php'); ?>