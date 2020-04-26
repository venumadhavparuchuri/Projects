<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");


   
?>

<BR><BR><br>
<FONT FACE="Century Gothic">



<FONT size="2" color="blue" FACE="Century Gothic">

<FORM NAME="LOGIN" ACTION="processChangePassword.php" METHOD="POST">


<TABLE Border=0 align=center>
<TR class=row_title ALIGN="center">
	   <TH COLSPAN="2"> Enter new password</TH>
</TR>

<TR class=row_even>
	<TD>Userid</TD>
	<TD><input TYPE=text name=uid size="8" maxlength="8"></TD>
</TR>
<TR class=row_odd>
	<TD>Old Password</TD>
	<TD><input TYPE=password name=pwd size="8"  maxlength="8"></TD>
</TR>
<TR class=row_even>
	<TD>New Password </TD>
	<TD><input TYPE=password name=newpwd size="8"  maxlength="8"></TD>
</TR>
<TR class=row_odd>
	<TD><INPUT TYPE=submit name=submit value="Submit">
</TD>
	<TD><INPUT TYPE=reset name=resett value="Reset" > 
</TD>
</TR>
</TABLE>


</FORM>
<?php include ('includes/footer.php'); ?>