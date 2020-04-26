<?php 
session_start();
if(isset($_SESSION['UserID'])){
// unset($_SESSION['maskon_client']);
// unset($_SESSION['maskon_client_name']);	 //Is Used To Destroy Specified Session
	session_destroy();
}			
?>
<html>
<head>
	<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<Title>Reports</Title>
<body text=ffffcc>
	<font face="Times New Roman" >
		<center>
			<BR><BR><BR>
			<h2 >You have successfully logged out</h2>
			<BR><BR>
			<!--Link to relogin again-->
			<h2 ><A href="login.php" target=_top>click here </A>to login in again</h2>
			<br><br>
			<h2 >Have a nice day</h2>
		</center>
	</font>
</body>
</html>