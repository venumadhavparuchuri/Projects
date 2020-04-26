<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include("includes/MultiLevelmenu.php");
include("config/conn.php");


$sql ="SELECT * FROM Login  order by `UserID`";

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$userListArr[] = $row;
	// print_r($row);
}
$count = 0;?>
<br><br>

<FORM Name='DelForm' METHOD="POST" ACTION="processDeleteUser.php">
<table width=800 height=300 background="Images/i11.jpg" align="center">
<tr>
<td><img src="Images/i8.jpg" height=200 width=500></td>
<td>
<table align="center" width="25%" bordercolor=#D8D8D8 border=0>
<TR><TH class='row_title' colspan=2>Delete User</TH></TR>
<tr> 
<td>USERID:</td>
<td><SELECT NAME="UserID">
<option selected="true" disabled="disabled">select</option> 
<?php foreach($userListArr as $item){?>
	<OPTION Value="<?php echo $item['UserID']?>"><?php echo $item['UserID']?></OPTION>
	<?php 
	$count++;
}?>
</SELECT>
</td>
</tr>
<TR><TD align=center Colspan=2><Input type='Submit' name='submit' value='Delete'></TD></TR>
</table>
</td>
</tr>
</table>
</FORM>
<H6 align=center> Select a record to delete from database </H6>
<?php include ('includes/footer.php'); ?>