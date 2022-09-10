<!DOCTYPE html>
<html>
<head>
  <title>MAHALAKSHMI STORES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/jquery.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
      $("#idregister").click(function(){
        fname=$("#fname").val();
        mail=$("#mail").val();
        password=$("#password").val();
        $.ajax({
          type:"POST",
          url:"addcustomer.php",
          data:"fname="+fname+"&mail="+mail+"&password="+password,
          success:function(html){
            if(html=='true'){
              $("#add_err2").html('<div class="alert alert-success"\Successfully Account Created.\</div>');
              window.location.href="customerdetailslogin.php";
            }
            else if(html=='false'){
              $("#add_err2").html('<div class="alert alert-danger">\Email address already in system.\</div>');
            }
            else if(html=='fname'){
              $("#add_err2").html('<div class="alert alert-danger">\First name required\</div>');
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
div.login{
      margin: 100px;
      padding: 20px;
      border: 1px solid black;
      background-color: #F0f0f0;
}
</style>
</head>
<body>
  <div class="container mt-3">
    <div class="mt-3 p-3 bg-success text-white rounded">
      <center>
      <h1>MAHALAKSHMI STORES</h1>
    </center>
    </div>
  <hr>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     <a class="navbar-brand text-success" href="#"><b>Customer Login</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
          <li class="nav-item">
            <a class="nav-link text-success" href="Home.php"><b>Home</b></a>
          </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="managerlogin.php"><b>Manager Login</b></a>
        </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="aboutus.html"><b>About Us</b></a>
        </li>

</ul>
    </div>
  </div>
</nav>
<hr>
</div>
<center>
<div class="container mt-3" style="border: 1px solid black; background-color:#F0f0f0;">
  <br>
  <h2 class="text-success">Customer Sign-Up</h2>
  <form>
    <div id="add_err2"></div>
    <div class="form-floating mb-4 mt-4">
      <input type="text" class="form-control" id="fname" placeholder="Full Name" name="fname" required>
      <label for="fname">Full Name</label>
    </div>
    <div class="form-floating mb-4 mt-4">
      <input type="email" class="form-control" id="mail" placeholder="Mail-ID" name="mail" required>
      <label for="mail">Mail-ID</label>
    </div>
    <div class="form-floating mb-4 mt-4">
      <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
      <label for="password">Password</label>
    </div>
    <button type="submit" id="idregister" class="btn btn-outline-success"><b>Sign Up</b></button>
    <a href="customerlogin.php"<button type="submit" class="btn btn-outline-success"><b>Already Sign Up?For Login</b></button></a>

    </form>
    <br>
</div>
</center>
</body>
</html>
