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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <style>
  *{
    scroll-behavior: smooth;
  }
  .scrollTop{
    position: fixed;
    bottom: 30px;
    right: 30px;
    padding: 10px 15px;
    background-color: green;
    color: #fff;
    border-radius: 1px solid #fff;
    cursor: pointer;
    transition: all 0.5s ease 0s;
  }
  .scrollTop:hover{
    background-color: #f7f7f7;
    color:#000;
  }
  </style>
</head>

<body>
<center>
<div class="container">
        <div class=" mt-3 p-3 bg-success text-white rounded">
          <h1>MAHALAKSHMI STORES</h1>
        </div>
  <hr>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     <a class="navbar-brand text-success" href="#"><b>Main Page</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link text-success" href="stock.php"><b>Upload Stock</b></a>
      </li>
  <li class="nav-item">
    <a>&nbsp;</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-success" href="deliverystatus.php"><b>Delivery Status</b></a>
  </li>
      <li class="nav-item">
        <a>&nbsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="updatestockstatus.php"><b>Update Status</b></a>
      </li>
        <li class="nav-item">
              <a>&nbsp;</a>
            </li>
            <li class="nav-item">
              <li class="nav-item">
                <a class="nav-link text-success" a href="itemsoldhistory.php"><b>Sold History</b></a>
              </li>
          <li class="nav-item">
            <a>&nbsp;</a>
          </li>
          <li class="nav-item">
            <li class="nav-item">
              <a class="nav-link text-success" a href="addcarousel.php"><b>Add Slides Photo</b></a>
            </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="feedbackretrive.php"><b>Customer Feedback</b></a>
      </li>
      <li class="nav-item">
        <a>&nbsp;</a>
      </li>
    <li class="nav-item">
      <a class="nav-link text-danger" href="mchangepassword.php"><b>Change Password</b></a>
    </li>
          <li class="nav-item">
            <a>&nbsp;</a>
          </li>
    <li class="nav-item">
      <a class="nav-link text-danger" href="managerlogout.php"><b>Logout</b></a>
    </li>
      </ul>
    </div>
  </div>
  </nav>
  <?php
  if(isset($_GET["message"])){
    if($_GET["message"]=="changepasswordsuccessfully")
    {?>
      <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <b>Password has been changed Successfully.</b></div>
        <?php }
  }
      ?>
            <hr>
            <h1 class="text-center text-success">Welcome to Admin(<?php echo $fname;?>)</h1>
                    <h3 class="text-center">Store Customers</h3>
        <?php
        include "dbconnect.php";
          $sql = "SELECT * FROM customerdetails";
          $result = $conn->query($sql);
            $row = mysqli_num_rows($result);
            ?>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;">
                        <thead style="color : black;">
                            <tr>
            <td class="text-center py-2"><b>Total Number of Customers</b></td>
            <td class="text-center py-2"><b><?php echo $row ?></b></td>
            </tr>
          </thead>
          </table>
          <?php
          $sql = "SELECT * FROM customerdetails";
          $result = mysqli_query($conn,$sql);
          ?>
          <div class="row sm-4">
                        <?php
                      while($rows=mysqli_fetch_assoc($result)){
                  ?>
                        <div class="col-sm-4">
                            <div class="table-responsive-sm">
                            <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                              <tr>
                                <td ><b>Customer Id:</b> <?php echo $rows['id']?></td>
                              </tr>
           </tr>
                              <tr>
                                <td ><b>Customer Name:</b> <?php echo $rows['fname']?></td>
                              </tr>
                              <tr>
                                <td><b>Phone Number:</b> <?php echo $rows['pnumber']?></td>
                              </tr>
                              <tr>
                                <td><b>E-Mail:</b> <?php echo $rows['mail']?></td>
                                </tr>
                                <tr>
                                  <td ><b>Premanent Address:</b> <?php echo $rows['paddress']?></td>
                                </td>
                                <tr>
                                  <td><b>Working Address:</b> <?php echo $rows['waddress']?></td>
                                </td>
          </tr>
          <tr>  <td class="text-center py-2"><a href="viewcustomerpurchase.php?mail=<?php echo $rows['mail'];?>"> <button type="button" class="btn btn-outline-success"><b>View Purchase History</b></button></a>
          </td></tr>

                            </table>
                          </div>
                        </div>
                      <?php } ?>
          </div>
        </div><br>
               </div>
               <a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>
               <div>
               <div class="bg-dark text-white rounded">
                 <center>
                   <p>Copyright &copy; 2022 Varunsimha M P<a href="tel:9066328318">(9066328318)</a></p>
               </center>
               </div>
             </div>
</body>

</html>

<?php

} else {
    header("location:managerlogin.php ");
}
?>
