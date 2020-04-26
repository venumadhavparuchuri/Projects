<?php
session_start();
// echo $_SESSION['Auth'];
if(!(isset($_SESSION['UserID']))) {
	header("location:login.php");
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

	<iframe width="100%" height="100%" name = Frame3 src="home.php" FrameBorder=0 ></iframe>

</body>
</html>