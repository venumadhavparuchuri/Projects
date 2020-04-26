<%@ page language="java" contentType="text/html; charset=ISO-8859-1"
    pageEncoding="ISO-8859-1"%>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Insert title here</title>
</head>
<body>

 <form class="form-horizontal" action="skillsetregaction.jsp">
<div class="container">
  <h3>Fill the application form</h3>
 
    <div class="form-group">
      <label class="control-label col-sm-4" for="email">Enter your Name</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="name" placeholder="" name="name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="idno">Enter Your Id Number</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="idno" placeholder="" name="idno">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwd">Number Of Batches Handled</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="batch" placeholder="" name="batch">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-4" for="pwd">Number Of Students Handled</label>
      <div class="col-sm-8">          
        <input type="text" class="form-control" id="batch" placeholder="" name="nohandle">
        </div>
    </div>
        
  
        <div class="form-group">
      <label class="control-label col-sm-4" for="pwd" >Enter The Current Position</label>
      <div class="col-sm-8"> 
      <select class="form-control" id="sel1" name="postingfrom">
        <option>Associate Trainer</option>
        <option>Trainer</option>
        <option>Manager</option>
        <option>editor</option>
      </select> 
     </div>
     </div>
     <div class="form-group">
     <label class="control-label col-sm-4" for="pwd" >Enter The Apply Position</label>
      <div class="col-sm-8"> 
      <select class="form-control" id="sel1" name="postingto">
        <option>Associate Trainer</option>
        <option>Trainer</option>
        <option>Manager</option>
        <option>editor</option>
      </select> 
     </div>
     </div>
       <div class="form-group">
      <label class="control-label col-sm-4" for="pwd" >Enter The Course Handled</label>
      <div class="col-sm-8"> 
      <select multiple class="form-control" id="sel2" name="coursehandled">
        <option>C,C++</option>
        <option>JAVA</option>
        <option>J2EE</option>
        <option>ANDROID</option>
        <option>PYTHON</option>
      </select>
    </div>
      </div>
      <div class="form-group">
      <label class="control-label col-sm-4" for="pwd">Comments</label>
      <div class="col-sm-8">
      <textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
    </div>
    </div>
    <div class="col-lg-12"><br></div>
			<input type="hidden" value="Waiting" name="status">
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
      <input type="submit" class="btn btn-primary"/>
      </div>
    </div>
    </div>
  </form>
    
</body>
</html>