<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1" import="java.sql.*"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
</head>
<body>
<%
try
{

String str="select * from skillset";

Class.forName("org.h2.Driver");

Connection con=DriverManager.getConnection("jdbc:h2:tcp://localhost/~/otj2ee","sa","");

Statement stm=con.createStatement();

ResultSet rs=stm.executeQuery(str);

%>
  <form class="form-horizontal" action="skillsetlogin.jsp" method="get">
<div class="container">

  
    <div class="form-group">
    <div class="row">
    <label class="col-sm-4 control-label">Name Of The Person Applied For Skill Set Approval</label>
    <div class="col-sm-6">
    <select class="form-control" name="name1">
    <%while(rs.next())
    {
    	
    	%>
    
    <option ><%=rs.getString(1)%></option>
    
    
      <%} %>
    </select>
    </div>
    <div class="col-sm-2">
    <input type="submit" class="btn btn-primary"/>      
    </div>
    </div>
    </div>
 <%}
catch(Exception r)
{
	System.out.println(r);
}
%>   
  </div>
</form>
</body>
</html>