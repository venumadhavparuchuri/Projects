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
 String e1=request.getParameter("email");

 String p1=request.getParameter("pass");
 
 String str2="update empreg set pass='"+p1+"' where email='"+e1+"'";
 

 //Db code
 //register the driver class
 
 Class.forName("org.h2.Driver");
 
 //Creating a Connection
 
 Connection conn=DriverManager.getConnection("jdbc:h2:tcp://localhost/~/otj2ee","sa","");
 
 //Creating a Statement
 
 Statement stm=conn.createStatement();
 
 stm.executeUpdate(str2);
 
 RequestDispatcher rd=request.getRequestDispatcher("employeehomepage.jsp");
 rd.forward(request,response);
%>
</body>
</html>