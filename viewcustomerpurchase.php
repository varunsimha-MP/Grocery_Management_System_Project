<?php
session_start();

if (isset($_SESSION['login'])) {

    $fname = $_SESSION['fname'];
    $mail = $_SESSION['mail'];

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
     <a class="navbar-brand text-success" href="#"><b>Customer Transaction History</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link text-success" href="managerpage.php"><b>Main Page</b></a>
      </li>
      </ul>
    </div>
  </div>
  </nav>
<hr>
          <?php
include "dbconnect.php";
?>
                <div class="table-responsive-sm">
             <table class="table table-hover table-striped table-condensed table-bordered">
                 <thead style="color : black;">
                   <tr>
                     <th class="text-center py-2">Item Name</th>
                     <th class="text-center py-2">Quantity</th>
                     <th class="text-center py-2">Item Pre Rate</th>
                     <th class="text-center py-2">Amount</th>
                     <th class="text-center py-2">Status</th>
                     <th class="text-center py-2">Date And Time</th>
                   </tr>
                         <?php
                         $mail = $_GET["mail"];
                                 $sql = "SELECT * FROM purchasehistory where mail='$mail'";

                                     $query =mysqli_query($conn, $sql);
                                 while($rows = mysqli_fetch_assoc($query)){
                         ?>
                         <tr style="color : black;">
                             <td class="text-center py-2"><?php echo $rows['sname']?></td>
                             <td class="text-center py-2"><?php echo $rows['quantity']?></td>
                             <td class="text-center py-2"><?php echo $rows['srate']?></td>
                             <td class="text-center py-2"><?php echo $rows['amount']?></td>
                             <td class="text-center py-2"><?php echo $rows['status']?></td>
                             <td class="text-center py-2"><?php echo $rows['dateandtime']?></td>

                         </tr>
                         <?php  }?>
                     </tr>
                 </thead>
                 </table>

<br><br>
</center>
</body>
</html>
<?php

} else {
    header("location:customerlogin.php ");
}
?>
