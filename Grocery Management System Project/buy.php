<?php
session_start();

if (isset($_SESSION['login'])) {
    $mail= $_SESSION['mail'];
    $fname = $_SESSION['fname'];

?>
<!DOCTYPE html>
<html>
<head>
  <title>MAHALAKSHMI STORES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History</title>
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
       <a class="navbar-brand text-success" href="#"><b>Purchase History</b></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-success" href="customerpage.php"><b>Main Page</b></a>
          </li>
              <li class="nav-item">
                <a>&nbsp;</a>
              </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="addcardpage.php"><b>Add to Cart</b></a>
        </li>
        </ul>
      </div>
    </div>
    </nav>
    <hr>
<?php
if(isset($_GET["message"])){
  if($_GET["message"]=="successfully")
  {?>
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <b>Successfully Buy Item.</b></div>
      <?php }
}
    ?>
        <h1 class="text-center pt-2 text-success">Purchase History</h1>
        <h6 class="text-center py-2">Note: Order will be Delivery within 24hours from order placed time.</h6>
        <h6 class="text-center py-2">Note: If Delivery Status is <b>Not to be Deliver</b> then call the Number<a href="tel:9066328318">(9066328318)</a>.</h6>
          <?php  include "dbconnect.php";
                    $sql = "SELECT * FROM purchasehistory where mail='$mail' order by dateandtime desc";

                      $query =mysqli_query($conn, $sql);
                    ?>  <div class="row-sm-12">
<?php
                  while($rows = mysqli_fetch_assoc($query)){
          ?>
          <div class="col-sm-12">
            <div class="table-responsive-sm">
            <table class="table table-hover table-sm table-striped table-condensed table-bordered">
              <tr >
                <th colspan="2" class="text-success text-center py-2"><h3><b><?php echo $rows['sname']?></b></h3></th>
              </tr>
          <tr>
            <td colspan="2" class="text-center py-2"><img src="uploads/<?php echo $rows['simage']; ?>" width="200px" height="200px"></td>
          </tr>
          <tr>
            <th class="text-center py-2">Quantity</th>
            <td class="text-center py-2"><?php echo $rows['quantity']?></td>
  </tr><tr>
            <th class="text-center py-2">Item Per Rate</th>
            <td class="text-center py-2"><?php echo $rows['srate']?></td>
  </tr><tr>
            <th class="text-center py-2">Amount</th>
            <td class="text-center py-2"><?php echo $rows['amount']?></td>
  </tr><tr>
            <th class="text-center py-2">Delivery status</th>
            <td class="text-center py-2"><?php echo $rows['status']?></td>
  </tr><tr>
            <th class="text-center py-2">Payment Mode</th>
            <td class="text-center py-2"><?php echo $rows['cash']?></td>
  </tr><tr>
            <th class="text-center py-2">Date And Time</th>
            <td class="text-center py-2"><?php echo $rows['dateandtime']?></td>

        </tr><hr>
<?php  }?>
    </tbody>
</table>
</div>
</div>
</div>
<a href="addcardpage.php"> <button type="button" class="btn btn-outline-success"><b>Back</b></button></a>
</div>
<a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>

</body>
</html>
<?php

} else {
    header("location:customerlogin.php ");
}
?>
