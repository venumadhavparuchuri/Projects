<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include("config/conn.php");


$empNo = $_REQUEST['txtEmpNo'];


$sql ="SELECT * FROM EmpMaster  WHERE EMPNO = '$empNo'";


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
	<LINK href="css/styles.css" type="text/css" rel="stylesheet">


<FORM action="processModifyDetails.php" method="GET" name="ModForm" 
onSubmit='return Check()'>
	<H3 CLASS=Top><?php echo $EMPName; ?>(<?php echo $EMPNO; ?>)</H3>
<TABLE>
	<TR class=row_odd><TD>EMPName</TD><TD><?php echo !empty($EMPName) ? $EMPName: "-"; ?></TD>			
	<TR class=row_even><TD>Emp Number</TD><TD><?php echo $EMPNO; ?></TD>
	<TR class=row_odd><TD>Email ID</TD><TD><?php echo !empty($MailID) ? $MailID: "-"; ?></TD>
	<TR class=row_even><TD>CurrentLocation</TD><TD><?php echo !empty($CurrentLocation) ? $CurrentLocation: "-"; ?></TD>
  	<TR class=row_odd><TD>JoiningDate</TD><TD><?php echo $JoiningDate; ?></TD>
  	<TR class=row_even><TD>Role</TD><TD><?php echo !empty($Role) ? $Role: "-"; ?></TD>
  	<TR class=row_odd>
		<TD>Primary Skill</TD>
		<TD><INPUT name=PrimarySkill type=text width="30" value="<?php echo $PrimarySkillset; ?>" onchange="setPriSkillFlag()"></TD>
	</TR>
	<TR class=row_even>
		<TD>Remarks</TD>
		<TD><INPUT name=Remarks type= text width="50" value="" onchange="setRemarksFlag()">(Enter new Remarks)
		<!--	<INPUT name=Remarks1 type= text width="30" value="<%=Remarks%>" DISABLED>  -->
			<TEXTAREA  WIDTH = "25" onchange='this.value="<?php echo $Remarks; ?>"'> <?php echo $Remarks; ?>" </TEXTAREA>(Existing Remarks)
		</TD>
	</TR>
	<TR class=row_odd>
	<td>
		<input type="Submit" value="Modify" id="sid" >
	</td>
	<td>
		<input type="Button" value="Cancel" onclick='window.close()' >
	</td>
	</tr>

</TABLE>
		<INPUT name=EmpNo type=hidden width="30" value="<?php echo $EMPNO; ?>">
		<INPUT name=EmpBaseCity type=hidden width="30" value="<?php echo $CurrentLocation; ?>">
</FORM>


<Script language="JavaScript">
var i;

var PriSkillFlag=false;
var remarksFlag=false;


/* Functions to set Flags if any of the details get modified */
function setPriSkillFlag()
{
	PriSkillFlag=true;

}
function setRemarksFlag()
{
	remarksFlag=true;
}

/*Checking wether any fields get modified or not.*/
function Check(){
//  modification in condition
if(PriSkillFlag==true||remarksFlag==true)
	{
	  if(remarksFlag==false){
		window.alert("Remarks Field is mandatory...while modifying details");
		return false;
	  }
	  else
		return true;
	}
	else{
		window.alert("Not Modified any Fields...Press Cancel to exit");
		return false;
	}
}
</script>