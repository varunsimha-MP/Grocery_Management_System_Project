<!DOCTYPE html>
<html>
<head>
  <title>New Register</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="js/jquery.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $("#register").click(function(){
      fname=$("#fname").val();
      lname=$("#lname").val();
      mail=$("#mail").val();
      password=$("#password").val();
      $.ajax({
        type:"POST",
        url:"addmanager.php",
        data:"fname="+fname+"&lname="+lname+"&mail="+mail+"&password="+password,
        success:function(html){
          if(html=='true'){
            $("#add_err2").html('<div class="alert alert-success"\Account Processed.\\</div>');
            window.location.href="managerlogin.php";
          }
          else if(html=='false'){
            $("#add_err2").html('<div class="alert alert-danger">\Email address already in system.\</div>');
          }
          else if(html=='fname'){
            $("#add_err2").html('<div class="alert alert-danger">\First name required\</div>');
         }
         else if(html=='lname'){
           $("#add_err2").html('<div class="alert alert-danger">\Last name required\</div>');
        }
        else if(html=='eshort'){
          $("#add_err2").html('<div class="alert alert-danger">\Mail required\</div>');
       }
       else if(html=='pshort'){
         $("#add_err2").html('<div class="alert alert-danger">\password required\</div>');
      }
      else{
        $("#add_err2").html('<div class="alert alert-danger">\Error\</div>');
     }
    },
    beforeSend:function(){
      $("#add_err2").html("<div class='alert alert-success'>\Loading......</div>");
    }
  });
  return false;
});
});
</script>
<style>
div.new{
 width:500px;
  margin-top: 150px;
}
</style>
</head>
<body>
  <center>

  <div class="new">
      <form> <h3>Form Register</h3>

<div id="add_err2"></div>

    <table>
      <tr>
        <td>First Name:</td><td><input type="text" maxlength="25" id="fname" name="fname"  class="form-control"></td>
      </tr>
      <tr>
        <td>Last Name:</td><td><input type="text" maxlength="25" id="lname" name="lname" class="form-control"></td>
      </tr>
      <tr>
        <td>Email:</td><td><input type="email" maxlength="25" id="mail" name="mail"class="form-control" ></td>
      </tr>
      <tr>
        <td>Password:</td><td><input type="password" maxlength="15" id="password" name="password" class="form-control"></td>
      </tr>
      <tr>
        <td>&nbsp;</td><td><input type="submit"  id="register" value="submit" class="btn btn-light"></td>
      </tr>
    </table>
  </form>
</div>
</center>
</body>
</html>
