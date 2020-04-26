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
HttpSession sess=request.getSession(true);


String u1=(String)sess.getAttribute("uname");
String s1=request.getParameter("status");
String str="update skillset set status='"+s1+"' where empname='"+u1+"'";;

Class.forName("org.h2.Driver");

Connection con=DriverManager.getConnection("jdbc:h2:tcp://localhost/~/otj2ee","sa","");

Statement stm=con.createStatement();

stm.executeUpdate(str);

RequestDispatcher ds=request.getRequestDispatcher("employeelogin.jsp");
ds.forward(request,response);

%>
</body>
</html>