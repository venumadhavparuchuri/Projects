<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<h3>EmployeeRegisterPage</h3>
<form action="empregaction.jsp" method="get">
Email:<input type="text" name="email"/>
Pass:<input type="text" name="pass"/>
Gender:
Male:<input type="radio" name="gen" value="Male">
Female:<input type="radio" name="gen" value="Female">
PhoneNo:<input type="text" name="phone"/>
<input type="submit" value="Register"/>
</form>
</body>
</html>