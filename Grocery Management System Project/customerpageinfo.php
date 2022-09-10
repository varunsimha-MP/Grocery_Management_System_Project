<?php
session_start();

if (isset($_SESSION['login'])) {
   $mail = $_SESSION['mail'];
    $fname = $_SESSION['fname'];
?>
<!DOCTYPE html>
<html>
<head>
  <title>MAHALAKSHMI STORES</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<center>
  <div class="container mt-3">
    <div class="mt-3 p-3 bg-success text-white rounded">
      <center>
      <h1>MAHALAKSHMI STORES</h1>
    </center>
    </div>
  <hr>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     <a class="navbar-brand text-success" href="#"><b>Customer Details</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="customerpage.php"><b>Main Page</b></a>
        </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
            <li class="nav-item">
              <li class="nav-item">
                <a class="nav-link text-success" a href="feedback.php"><b>Feedback</b></a>
              </li>

      </ul>
    </div>
  </div>
  </nav>
<hr>
        <?php
include "dbconnect.php";
        if(isset($_GET["message"])){
          if($_GET["message"]=="updatesuccessfully")
          {?>
            <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <b>Successfully Update Details.</b></div>
              <?php }
        }
            ?>
        <h5 class="text-center text-success">Customer Mail-Id: <?php echo $mail;?></h5>
        <?php
        $sql="SELECT * FROM customerdetails where mail='$mail'";
        $result=$conn->query($sql);
          $result = mysqli_query($conn,$sql);
      ?>
                      <?php
                          $rows=mysqli_fetch_assoc($result);
                      ?>
                      <div class="row">
                          <div class="col">
                              <div class="table-responsive-sm">
                              <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                                  <thead style="color : black;">
                                      <tr>
                                      <th scope="col" class="text-center py-2">Full Name</th>
                                      <td class="text-center py-2"><?php echo $rows['fname']; echo " ";?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col" class="text-center py-2">Phone Number</th>
                                      <td class="text-center py-2"><?php echo $rows['pnumber']?></td>
                                    </tr>
                                    <tr>
                                      <th scope="col" class="text-center py-2">Mail-Id</th>
                                      <td class="text-center py-2"><?php echo $rows['mail']?></td>
                                      </tr>
                                                          <tr>
                                                            <th scope="col" class="text-center py-2">Home Address</th>
                                                            <td class="text-center py-2"><?php echo $rows['paddress']?></td>
                                                          </tr>
                                                          <tr>
                                                            <th scope="col" class="text-center py-2">Work Place</th>
                                                            <td class="text-center py-2"><?php echo $rows['waddress']?></td>
                                                            </tr>
                                    <tr>
                                      <td class="text-center py-2"><a href="customerdetailsupdateform.php?id= <?php echo $rows['id'] ;?>"> <button type="button" class="btn btn-outline-success"><b>Edit Infomation</b></button></a></td>
                                    </tr>
                                  </thead>
                                              </table>
                                              </div>
                                          </div>
                                      </div>
                                 </div>
</body>
</html>

<?php

} else {
    header("location:customerpage.php ");
}
?>
