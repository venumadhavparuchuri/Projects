<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include("config/conn.php");



$txtEmpNo = $_REQUEST['txtEmpNo'];
// echo $empNo;
$sql ="SELECT * FROM EmpMaster  WHERE EMPNO = '$txtEmpNo'";

$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$EMPName = $row["EMPName"];
$EMPNO = $row["EMPNO"];
$MailID = $row["MailID"];
$CurrentLocation = $row["CurrentLocation"];
$JoiningDate = $row["JoiningDate"];
$Role = $row["Role"];
$PrimarySkillset = $row["PrimarySkillset"];
$Remarks = $row["Remarks"];


?>

<HEAD>
	<TITLE> Employee Details </TITLE>
	<META NAME="Generator" CONTENT="EditPlus">
	<META NAME="Author" CONTENT="">
	<META NAME="Keywords" CONTENT="">
	<META NAME="Description" CONTENT="">
	<LINK href="css/styles.css" type="text/css" rel="stylesheet">
	
		<H3 CLASS=Top> <?php echo $EMPName; ?>(<?php echo $EMPNO; ?>)</H3>
		<TABLE>
			<TR class=row_odd><TD>EMPName</TD>
				<TD><?php echo !empty($EMPName) ? $EMPName: "-"; ?></TD>			
				<TR class=row_even>
					<TD>Emp Number</TD>
					<TD><?php echo $EMPNO; ?></TD>
					<TR class=row_odd>
						<TD>Email ID</TD>
						<TD><?php echo !empty($MailID) ? $MailID: "-"; ?></TD>
						<TR class=row_even>
							<TD>CurrentLocation</TD>
							<TD><?php echo !empty($CurrentLocation) ? $CurrentLocation: "-"; ?></TD>
							<TR class=row_odd>
								<TD>JoiningDate</TD>
								<TD><?php echo $JoiningDate; ?></TD>
								<TR class=row_even>
									<TD>Role</TD>
									<TD><?php echo !empty($Role) ? $Role: "-"; ?></TD>
									<TR class=row_odd>
										<TD>Primary Skill</TD>
										<TD><?php echo !empty($PrimarySkillset) ? $PrimarySkillset: "-"; ?></TD>
										<TR class=row_odd>
											<TD>Remarks</TD>
											<TD><?php echo !empty($Remarks) ? $Remarks: "-"; ?></TD>
										</TABLE>

										<?php

if($_SESSION['Auth']==0){
	$label ="Edit";
	?><TR><TD><INPUT TYPE="button" value="<?php echo $label; ?>" onclick='editDetails("<?php echo $label; ?>","<?php echo $EMPNO; ?>");'></TD>
				<TD><INPUT TYPE="button" value="Close" onclick='window.close()'></TD></TR>
				<?php

}else{
	$label ="Close";
	?><TR><TD><INPUT TYPE="button" value="<?php echo $label; ?>" onclick='editDetails("<?php echo $label; ?>","<?php echo $EMPNO; ?>");'></TD></TR>

<?php
}


?>
									

									<SCRIPT LANGUAGE="JavaScript">
										function editDetails(Label , strEmpNo){


											var Loc = "processEditEmpDetail.php?txtEmpNo="+strEmpNo;

											if(Label=="Close")	{ window.close(); }
											else if(Label == "Edit") 
											{
												location.replace(Loc);
											}


										}
      </SCRIPT>