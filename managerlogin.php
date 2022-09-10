<!DOCTYPE html>
<html>
<head>
  <title>MAHALAKSHMI STORES</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.js"></script>
  <script type="text/javascript">
            $(document).ready(function(){

         $("#login").click(function(){

          mail=$("#mail").val();
          password=$("#password").val();
           $.ajax({
            type: "POST",
            url: "managerpcheck.php",
            data: "mail="+mail+"&password="+password,
            success: function(html){
              if(html=='true')
              {

                $("#add_err2").html('<div class="alert alert-success"> \
                          <strong>Authenticated</strong> success \ \
                        </div>');

              window.location.href = "managerpage.php";

              } else if (html=='false') {
                $("#add_err2").html('<div class="alert alert-danger"> \
                          <strong>Authentication</strong> failure. \ \
                        </div>');

              } else {
                $("#add_err2").html('<div class="alert alert-danger"> \
                          <strong>Error</strong> processing request. Please try again. \ \
                        </div>');
              }
            },
            beforeSend:function()
            {
                            $("#add_err2").html("loading...");
            }
          });
           return false;
        });
  });
    </script>
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
       <a class="navbar-brand text-success" href="#"><b>Manager Login</b></a>
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
            <a class="nav-link text-success" href="customerlogin.php"><b>Customer Login</b></a>
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
  <div>
<?php
if(isset($_GET["logout"])){
  if($_GET["logout"]=="true")
  {?>
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <b>You have been logged out of the system.</b></div>
      <?php }
}
    ?>
  </div>
    <center>
      <div class="container mt-3" style="border: 1px solid black; background-color:#F0f0f0;">
        <br>
        <h1 class="text-success">Manager Login</h1>
        <form>
          <div id="add_err2"></div>
          <div class="form-floating mb-4 mt-4">
            <input type="text" class="form-control" id="mail" placeholder="Manager ID" name="mail" required>
            <label for="mail">Mail-ID</label>
          </div>
          <div class="form-floating mb-4 mt-4">
            <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
            <label for="password">Password</label>
          </div>
          <button type="submit" id="login" class="btn btn-outline-success"><b>Login</b></button></td>
          </form>
          <br>
      </div>

</center>
</div><br>
<div class="container">
<div class="bg-dark text-white rounded">
  <center>
    <p>Copyright &copy; 2022 Varunsimha M P<a href="tel:9066328318">(9066328318)</a></p>
</center>
</div>
</div>
</body>
</html>
