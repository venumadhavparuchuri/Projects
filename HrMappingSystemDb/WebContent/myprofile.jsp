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
String s1=(String)sess.getAttribute("k1");
//out.println(s1);

String str1="select email,pass,phone from empreg where email='"+s1+"'";
//Db code
//register the driver class

Class.forName("org.h2.Driver");

//Creating a Connection

Connection conn=DriverManager.getConnection("jdbc:h2:tcp://localhost/~/otj2ee","sa","");

//Creating a Statement

Statement stm=conn.createStatement();

ResultSet rs=stm.executeQuery(str1);

rs.next();

%>
<form action="updateaction.jsp" method="get">
Email:<input type="text" name="email" value="<%=rs.getString(1)%>"/>
Pass:<input type="text" name="pass" value="<%=rs.getString(2)%>"/>
PhoneNo:<input type="text" name="phone" value="<%=rs.getString(3)%>"/>
<input type="submit" value="update"/>
</form>
</body>
</html>