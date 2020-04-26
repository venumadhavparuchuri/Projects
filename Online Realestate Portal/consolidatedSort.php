<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");

include("config/conn.php");


$OrderBy = isset($_GET['orderby']) ? $_GET['orderby']: "null";
// echo $OrderBy;
$sql ="SELECT * FROM EmpMaster  order by $OrderBy";
// echo $sql;

$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
	$EmpListArr[] = $row;
	// print_r($row);
}
// if (empty($row)) {
// 	echo "<CENTER>
// 		<B>No Records found............<B><BR>
// 		<A href="Report.jsp"> Back </A>
// 		</CENTER>";
// 		exit;
// }
$count = 0;
?>
<center>
<P align=right><a class=title onclick="javascipt:window.print()" onmouseover="this.style.cursor='hand'" ><img src="Images/printer.gif" width="37" height="38" border=0 alt="Print"></a></P>
<h2 align=center>Employee List</h2>
<form name=cons>
	<table class=notebook>

	<tr class=row_title>
	<th class=row_title><a class=title href="consolidatedSort.php?orderby=EMPName">EMPName</a></th>
	<th class=row_title><a class=title href="consolidatedSort.php?orderby=EMPNO">EMPNO</a></th>
	<th class=row_title><a class=title href="consolidatedSort.php?orderby=MailID">Mail ID</th>
	<th class=row_title><a class=title href="consolidatedSort.php.?orderby=CurrentLocation">CurrentLocation</a></th>
	<th class=row_title><a class=title href="consolidatedSort.php?orderby=JoiningDate">JoiningDate</a></th>
	<th class=row_title><a class=title href="consolidatedSort.php?orderby=Role">Role</a></th>
	<th class=row_title><a class=title href="consolidatedSort.php?orderby=PrimarySkillset">Qualification</a></th>
	<th class=row_title><a class=title href="consolidatedSort.php?orderby=Remarks">Remarks</a></th>
	</tr>

		<?php foreach($EmpListArr as $item){?>
				<tr class= "<?php echo ($count%2!=0)? "row_even" : "row_odd" ?>" >
					<td><center><?php echo $item['EMPName']?></center></td>
					<td><a id="x" href='javascript:fnEmpPopUp("<?php echo $item['EMPNO']?>")' target="_self"><?php echo $item['EMPNO']?>  </a></td>
					<td><center><?php echo $item['MailID']?></center></td>

					<td><?php echo $item['CurrentLocation']?></td>
					<td><?php echo $item['JoiningDate']?></td>
					<td><?php echo $item['Role']?></td>
					<td><?php echo $item['PrimarySkillset']?></td>
					<td><?php echo $item['Remarks']?></td>
				</tr>
				<?php 
				$count++;
			}?>


</Table>
</Form>
</center>
<SCRIPT LANGUAGE="JavaScript">
<!--

function fnEmpPopUp(strEmpNo)
{ 

var intLeft=0;
var strTitle ='Details';
var strUrl = 'empDetail.php?txtEmpNo='+strEmpNo;
	intLeft = screen.availWidth/2;
var strOptions= 'menubar=no,toolbar=no,scrollbars=yes,resizable=Yes,height=300,width=500,left=' + (intLeft)  + ',top=0';
fnNewDetailsPopUp(strUrl,strTitle,strOptions);
}	
function fnNewDetailsPopUp(strUrl,strTitle,strOptions)
{
	popupWin = window.open(strUrl,strTitle,strOptions).focus();
}

//-->
</SCRIPT>
<?php include ('includes/footer.php'); ?>