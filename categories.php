<?php
session_start();

if (isset($_SESSION['login'])) {
  $mail=$_SESSION['mail'];
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
  <div class="container mt-3">
    <div class="mt-3 p-3 bg-success text-white rounded">
      <center>
      <h1>MAHALAKSHMI STORES</h1>
    </center>
    </div>
  <hr>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     <a class="navbar-brand text-success" href="customerpage.php"><b>Main Page</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
    <li class="nav-item">
      <a>&nbsp;</a>
    </li>
        <li class="nav-item dropdown">
          <?php
            include "dbconnect.php";
            $sql = "SELECT distinct stype FROM stock";
            $result = $conn->query($sql);
              $row = mysqli_num_rows($result);
              ?>
          <a class="nav-link dropdown-toggle text-success" data-bs-toggle="dropdown">Categories</a>
          <ul class="dropdown-menu">
            <?php
                while($rows=mysqli_fetch_assoc($result)){
            ?>
            <li><a class="nav-link text-success" href="categories.php?stype=<?php echo $rows['stype'] ;?>"> <?php echo $rows['stype'] ;?></a></li>
          <?php }
          ?>
          </ul>
        </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="addcardpage.php"><b>Add to Cart</b></a>
      </li>
  <li class="nav-item">
    <a>&nbsp;</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-success" href="buy.php"><b>Purchase History</b></a>
  </li>
      <li class="nav-item">
        <a>&nbsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="customerpageinfo.php"><b>Customer Details</b></a>
      </li>
        <li class="nav-item">
              <a>&nbsp;</a>
            </li>
            <li class="nav-item">
              <li class="nav-item">
                <a class="nav-link text-success" a href="feedback.php"><b>Feedback</b></a>
              </li>
          <li class="nav-item">
            <a>&nbsp;</a>
          </li>
<li class="nav-item">
<a class="nav-link text-danger" href="customerlogout.php"><b>Logout</b></a>
</li>
      </ul>
    </div>
  </div>
  </nav>
<hr>
<?php
include "dbconnect.php";
$stype = $_GET["stype"];
$sql="SELECT * FROM stock WHERE stype='$stype'";
$result = mysqli_query($conn,$sql);
?>
<h5 class="text-center text-success">Customer E-Mail Id:<?php echo $mail;?></h5>
<hr>
<div class="row sm-4">
              <?php
            while($rows=mysqli_fetch_assoc($result)){
        ?>
              <div class="col-sm-4">
                  <div class="table-responsive-sm">
                  <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                    <tr>
                      <td class="text-success py-2"><h3><b><?php echo $rows['stype']?></b></h3></td>
                    </tr>
                    <tr>
                      <td class="text-center py-2"><?php echo "<img src='".$rows['simage']."' style='width:200px',height:200px;>" ?></td>
                    </tr>
                    <tr>
                      <td class="py-2"><b>Item Name: <?php echo $rows['sname']?></b></td>
                    </tr>
                    <tr>
                      <td class="py-2"><b>Rate Per Item: &#x20B9;<?php echo $rows['srate']?></b></td>
                    </tr>
                    <tr>
                      <td><form method="post" action="addcard.php">
                        <input type="hidden" id="mail" name="mail" value="<?php echo $mail;?>">
                        <input type="hidden" id="sname" name="sname" value="<?php echo $rows['sname']?>">
                        <input type="number" min="1" id="quantity" name="quantity" placeholder="Quantity" required>&nbsp;&nbsp;
                        <input type="hidden" id="srate" name="srate" value="<?php echo $rows['srate']?>">
                        <input type="hidden" id="simage" name="simage" value="<?php echo $rows['simage']?>">
                        <input type="hidden" id="status" name="status" value="To be Deliver">
                        <input type="hidden" id="cash" name="cash" value="Cash On Delivery">
                        <input type="submit" value="Add To Cart"></form></td>
</tr>
                  </table>
                </div>
              </div>
            <?php } ?>
</div>
<a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>
</body>
</html>
<?php

} else {
    header("location:customerpage.php ");
}
?>
