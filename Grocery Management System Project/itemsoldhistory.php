<?php
session_start();

if (isset($_SESSION['login'])) {
  $mail = $_SESSION['mail'];
   $fname = $_SESSION['fname'];

?>

<!DOCTYPE html>
<html>
<title>MAHALAKSHMI STORES</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<head>
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
  <div class="container">
    <div class="mt-3 p-3 bg-success text-white rounded">
      <center>
      <h1>MAHALAKSHMI STORES</h1>
    </center>
  </div>
  <hr>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     <a class="navbar-brand text-success" href="#"><b>Sold History</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <li class="nav-item">
            <a class="nav-link text-success" a href="managerpage.php"><b>Main Page</b></a>
          </li>
      <li class="nav-item">
        <a>&nbsp;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="feedbackretrive.php"><b>Customer Feedback</b></a>
      </li>
      </ul>
    </div>
  </div>
</nav>
  <div class="container">
<hr>
<div class="table-responsive-sm">
<table class="table table-hover table-striped table-condensed table-bordered">
 <thead style="color : black;">
     <tr>
       <th class="text-center">Mail Id</th>
       <th class="text-center">Full Name</th>
       <th class="text-center">Phone Number</th>
       <th class="text-center">Home Address</th>
       <th class="text-center">Work Place</th>
         <th class="text-center">Item Name</th>
         <th class="text-center">Quantity</th>
         <th class="text-center">Per Item Rate</th>
         <th class="text-center">Amount</th>
         <th class="text-center">Status</th>
         <th class="text-center">Date & Time</th>
     </tr>
 </thead>
 <tbody>
 <?php
 include "dbconnect.php";
$sql = "SELECT * from purchasehistory ph,customerdetails cd where cd.mail=ph.mail order by dateandtime desc";
$query =mysqli_query($conn, $sql);
while($rows = mysqli_fetch_assoc($query)){
?>
<tr style="color : black;">
  <td class="text-center py-2"><?php echo $rows['mail']?></td>
  <td class="text-center py-2"><?php echo $rows['fname']?></td>
  <td class="text-center py-2"><?php echo $rows['pnumber']?></td>
  <td class="text-center py-2"><?php echo $rows['paddress']?></td>
  <td class="text-center py-2"><?php echo $rows['waddress']?></td>
<td class="text-center py-2"><?php echo $rows['sname']?></td>
<td class="text-center py-2"><?php echo $rows['quantity']?></td>
<td class="text-center py-2"><?php echo $rows['srate']?></td>
<td class="text-center py-2"><?php echo $rows['amount']?></td>
<td class="text-center py-2"><?php echo $rows['status']?></td>
<td class="text-center py-2"><?php echo $rows['dateandtime']?></td>
</tr>
<?php  }?>
</tbody>
</table>
</div>
</div>
<a href="managerpage.php"> <button type="button" class="btn btn-outline-success"><b>Back</b></button></a>
<a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>
</body>
</html>
<?php

} else {
    header("location:managerlogin.php ");
}
?>
