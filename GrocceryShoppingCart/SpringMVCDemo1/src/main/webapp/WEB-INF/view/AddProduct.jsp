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
<form action="">
  <div class="form-group">
    <label for="pid">ProductId</label>
    <input type="text" class="form-control" id="pid">
  </div>
  <div class="form-group">
    <label for="pname">ProductName</label>
    <input type="text" class="form-control" id="pname">
  </div>
   <div class="form-group">
    <label for="price">ProductPrice</label>
    <input type="text" class="form-control" id="price">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form>

<jsp:include page="footer.jsp"></jsp:include>

</body>
</html>