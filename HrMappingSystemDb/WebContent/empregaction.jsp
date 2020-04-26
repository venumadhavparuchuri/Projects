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
  
  String gen=request.getParameter("gen");
  
   //int ph1=Integer.parseInt(request.getParameter("phone"));
 
  String phone=request.getParameter("phone");
   
  
  String str1="insert into empreg values('"+e1+"','"+p1+"','"+gen+"','"+phone+"')";
  
  //Db code
  //register the driver class
  
  Class.forName("org.h2.Driver");
  
  //Creating a Connection
  
  Connection conn=DriverManager.getConnection("jdbc:h2:tcp://localhost/~/otj2ee","sa","");
  
  //Creating a Statement
  
  Statement stm=conn.createStatement();
  
  stm.executeUpdate(str1);
  
  RequestDispatcher rd=request.getRequestDispatcher("employeelogin.jsp");
  rd.forward(request,response);
  
%>
</body>
</html>