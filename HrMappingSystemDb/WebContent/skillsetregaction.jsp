<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1" import="java.sql.*"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<%
String course = "";
String a1 = request.getParameter("name");
String a2 = request.getParameter("idno");
String a3 = request.getParameter("batch");
String a4 = request.getParameter("nohandle");
String a5 = request.getParameter("postingfrom");
String a6 = request.getParameter("postingto");
String a7[] = request.getParameterValues("coursehandled");
for(String a : a7)
{
	course = course + a + " ";
}
String a9 = request.getParameter("comment");
String a10 = request.getParameter("status");

String data = "insert into skillset values('"+a1+"','"+a2+"','"+a3+"','"+a4+"','"+a5+"','"+a6+"','"+course+"','"+a9+"','"+a10+"')";
Class.forName("org.h2.Driver");
Connection con = DriverManager.getConnection("jdbc:h2:tcp://localhost/~/otj2ee","sa","");
Statement st = con.createStatement();
st.executeUpdate(data);
RequestDispatcher di = request.getRequestDispatcher("employeelogin.jsp");
di.forward(request,response);
%>
</body>
</html>