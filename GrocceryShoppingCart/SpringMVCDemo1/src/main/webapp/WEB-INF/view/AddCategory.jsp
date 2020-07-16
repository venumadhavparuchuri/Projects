<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>
<jsp:include page="header.jsp"></jsp:include>

<form action="addcategory" method="get">
  <div class="form-group">
    <label for="cid">CategoryId</label>
    <input type="text" class="form-control" id="cid" name="cid">
  </div>
  <div class="form-group">
    <label for="cname">CategoryName</label>
    <input type="text" class="form-control" id="cname" name="cname">
  </div>
   <button type="submit" class="btn btn-default">Submit</button>
  </form>

<jsp:include page="footer.jsp"></jsp:include>
</body>
</html>