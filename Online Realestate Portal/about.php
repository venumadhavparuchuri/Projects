<?php
session_start();

if(!(isset($_SESSION['UserID']))) {
	exit;
}
include('includes/header.php');
include ("includes/MultiLevelmenu.php");

?>



<H3 align=center>About</H3>
<font color="#990000" type="verdana">
<font color="#CC66FF"><U><B>Reality Business Information System v1.0</B></U></font><BR>
<b>This application has been developed with the core objective of addressing and to fulfill Real Estate Business needs.
This application involves in managing sales book, Plot management, sundry creditors and installment details.
This application has three modules includes<BR><BR>
<ul>
	<li>	Plot Management
<ul>
	<li>	To View/Update the plot details<BR>
	<li>	To keep track Sold, Vacant, Reserved plot details<BR><BR>
	<li>	To add new plots into database<BR>
</ul>
<li>	Sales Data
<ul>
	<li>	To View/Update the sales book
	<li>	To  sale plots or alter plot details
	<li>	To track the payments made by customers
	<li>	To make new payments installment wise
</ul>
<li>	Reports
<ul>
	<li>	Keep track the reporting part
	<li>	Various reports like sundry creditors, sundry debtors, sold plots, vacant plots, reserved plots, payments made etc
</ul>
</ul>
This application makes the organization to efficiently manage their resources using the following features.
</b></font>