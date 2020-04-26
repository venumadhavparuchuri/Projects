<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<h3>EmployeeHomePage</h3>
<%

  HttpSession sess=request.getSession(true);
  String h1=(String)sess.getAttribute("k1");
  out.println("Welcome"+h1);

%>
<a href="SkillSetReg.jsp"><button type="button">EmployeeSkill</button></a>
<a href="myprofile.jsp"><button type="button">MyProfile</button></a>
</body>
</html>