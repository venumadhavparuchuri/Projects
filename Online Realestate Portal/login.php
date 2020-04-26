<?php
session_start();
 //echo $_SESSION['login_user_acc_type'];
if(isset($_SESSION['UserID'])){
	header("location:index.php");
	exit;
} 
?>
<html>
<head>
	<link href="css/styles.css" type="text/css" rel="stylesheet">
</head>
<body class=SC >
	<center>
		<font face="Arial" color="#ff8080" size=7>REAL ESTATE</font>
		<table width=400 height=20 border=2 style="margin-bottom:10px;">
			<tr>
				<td><img src="Images/i2.jpg" height=50 width=100></td>
				<td><img src="Images/i3.jpg" height=50 width=100></td>
				<td><img src="Images/i4.jpg" height=50 width=100></td>
				<td><img src="Images/i5.jpg" height=50 width=100></td>
				<td><img src="Images/i6.jpg" height=50 width=100></td>
				<td><img src="Images/i7.jpg" height=50 width=100></td>
				<td><img src="Images/i8.jpg" height=50 width=100></td>
				<td><img src="Images/i9.jpg" height=50 width=100></td>
				<td><img src="Images/i10.jpg" height=50 width=100></td>
			</tr>
		</table>
	</center>
	<hr style="height: 4px; background: #fff; margin: 0;">

	<FONT FACE="monotype corsiva" size=6 color="#ff8000">WELCOME TO REALESTATE PROJECT</FONT>
	<center>
		<br><br>
		<FONT FACE="Century Gothic">
			<FONT COLOR="Red" id="err"></FONT>
			<BR><BR>
			<!-- ***** LOGIN SCREEN ***** -->
			<form class="form-horizontal" name="name" action="#" method="post" onSubmit="return validate()">
				<table align="center" background="Images/i11.jpg">
					<tr>
						<td align="cercen"><img src="Images/i1.jpg" width=600 height=150></td>
					</tr>
					<tr>
						<td align="center"> 
							<FONT COLOR="#ff0080" size=4><b>Enter your userid and password to login</b></FONT>
							&nbsp;&nbsp;&nbsp;&nbsp;
							<table align="center" border=5 width=200 height=100>
								<tr>
									<td> 
										<FONT COLOR="blue" size=3><b>Userid :</b></FONT>  
									</td>
									<td>
										<input type="text" id = "username" name="username" size="8" maxlength="8"> 
									</td>
								</tr>
								<tr>
									<td>
										<FONT COLOR="blue" size=3><b>Password :</b></FONT>
									</td>
									<td> 
										<input type="password" id="password" name="password" size="8"  maxlength="8">
									</td>
								</tr>
								<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								<br>
								<tr>
									<td>
										<INPUT type="button" name="login_btn" id="login_btn" value="submit">
									</td>
									<td>
										<INPUT type="reset" name="reset" value="Reset" >
									</td>
								</tr> 
							</table>
						</td>
					</tr>
				</table>
				<br>
				<br>
				<br>
				<marquee>
					<FONT COLOR="red" size=4>
						<b>Welcome to RealEstate Firm search for the required data easily and processes at a real estate agency perform various operations using the interfaces provided by the system .........</b>
					</FONT>
				</marquee>
				<script type="text/javascript" src="js/jquery-2.2.1.min.js"></script>
				<script type="text/javascript" src="js/main.js"></script>
			</body>
			</html>