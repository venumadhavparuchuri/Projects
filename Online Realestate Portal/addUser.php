<?php
session_start();
if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include("includes/MultiLevelmenu.php");


   
?>
<center>

<BR><BR><br><br>
<FONT FACE="Century Gothic">



<FONT size="2" color="blue" FACE="Century Gothic">

<FORM NAME="NewUser" ACTION="processAddUser.php" METHOD="POST" onsubmit="return validate()">


<TABLE Border=0 align=center>
<TR class=row_title ALIGN="center">
	   <TH COLSPAN="2"> Add user</TH>
</TR>

<TR class=row_even>
	<TD>Userid * </TD>
	<TD><input TYPE=text name=uid size="8" maxlength="8"></TD>
</TR>
<TR class=row_odd>
	<TD>Password * </TD>
	<TD><input TYPE=password name=pwd size="8"  maxlength="8"></TD>
</TR>
<TR class=row_even>
	<TD>Authentication * </TD>
	<TD><input TYPE=text name=auth size="1"  maxlength="1"> (0-admin,1-normal User)</TD>
</TR>
<TR class=row_odd>
	<TD><INPUT TYPE=submit name=submit value="Submit">
</TD>
	<TD><INPUT TYPE=reset name=resett value="Reset" > 
</TD>
</TR>
</TABLE>


</FORM>
</center>
<SCRIPT LANGUAGE="JavaScript">
<!--
history.go(+1);
function validate(){
 x = document.NewUser.uid;
 y = document.NewUser.pwd;
 z = document.NewUser.auth;
 var ed=x.value;
 var pd=y.value;
 var ad=z.value;
 var pattern = /^([a-zA-Z0-9\_\. ]{4,8})$/;
 var Apattern = /^([0-1]{1})$/;
 if(!(pattern.test(ed))){
	alert("Invalid username");
    return false;
	}
 else if(!(pattern.test(pd))){
	alert("Invalid password");
    return false;
	}
 else if(!(Apattern.test(ad))){
	alert("Invalid Authentication");
	return false;
  }
 else
   return true;

}
//-->
</SCRIPT>

<?php include ('includes/footer.php'); ?>