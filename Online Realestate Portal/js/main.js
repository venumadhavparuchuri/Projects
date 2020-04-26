$(document).ready(function () {
	reset_login();
  $('#login_btn').click(function(e){
    e.preventDefault();
    var err="";
    var element = $(this).parent().parent().parent();
    var username = $('#username').val();
    var password = $('#password').val();
    if(username == '' || password == ''){
      err = "Both the fields are Mandatory. Please fill up both fields.";
      $("#err").empty().append(err);

    }else{
      $.post('process/validate.php', {username: username, password: password}, function (data) {
        if(data == 1)
        {
          window.location = "index.php";
        }
        else {
          err = "Invalid Username and Password";
          $("#err").empty().append(err);
          reset_login();
        }					
      });
    }
  });

  function reset_login(){
    $('#username').val("");
    $('#password').val("");
  }
});