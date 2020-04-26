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

try
{
String e1=request.getParameter("email");

String p1=request.getParameter("pass");

String str1="select email,pass from empreg where email='"+e1+"' and pass='"+p1+"'";

//Db code
//register the driver class

Class.forName("org.h2.Driver");

//Creating a Connection

Connection conn=DriverManager.getConnection("jdbc:h2:tcp://localhost/~/otj2ee","sa","");

//Creating a Statement

Statement stm=conn.createStatement();

ResultSet rs=stm.executeQuery(str1);

rs.next();

//Based on column name
//String email=rs.getString("email");

//String pass=rs.getString("pass");

String email=rs.getString(1).trim();

String pass=rs.getString(2).trim();

System.out.println(email);
System.out.println(pass);
 if(e1.equals(email)&&p1.equals(pass))
{
	 HttpSession sess=request.getSession();
	 sess.setAttribute("k1",e1);
	 RequestDispatcher rd=request.getRequestDispatcher("employeehomepage.jsp");
	 rd.forward(request,response);
	//out.println("LoginSucess");
}
 
}
catch(Exception t)
{
	//System.out.println(t);
  out.println("LoginFail..");	
}
%>
</body>
</html>