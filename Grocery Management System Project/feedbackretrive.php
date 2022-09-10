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
     <a class="navbar-brand text-success" href="#"><b>Customer Feedback</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="managerpage.php"><b>Main Page</b></a>
        </li>
    <li class="nav-item">
      <a>&nbsp;</a>
    </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="itemsoldhistory.php"><b>Sold History</b></a>
      </li></ul>
    </div>
  </div>
</nav>
<div class="container mt-3">
  <hr>
</div>
            <div class="container">
                    <h1 class="text-center text-success">Customers Review</h1>
        <?php
        include "dbconnect.php";
          $sql = "SELECT * FROM feedback";
          $result = mysqli_query($conn,$sql);
      ?>
                  <div class="row">
                      <div class="col">
                          <div class="table-responsive-sm">
                          <table class="table table-hover table-sm table-striped table-condensed table-bordered" style="border-color:black;">
                              <thead style="color : black;">
                                  <tr>
                                  <th class="text-center py-2">Customer Account ID</th>
                                  <th class="text-center py-2">Customer Name</th>
                                  <th class="text-center py-2">Comment</th>
                                  <th class="text-center py-2">Customer Review</th>
                                  <th class="text-center py-2">Manager Response</th>
                                  <th class="text-center py-2">Update Response</th>

                                  </tr>
                              </thead>
                              <tbody>
                      <?php
                          while($rows=mysqli_fetch_assoc($result)){
                      ?>
                          <tr style="color : black;">
                              <td class="text-center py-2"><?php echo $rows['mail']?></td>
                              <td class="text-center py-2"><?php echo $rows['fname']?></td>
                              <td class="text-center py-2"><?php echo $rows['comment']?></td>
                              <td class="text-center py-2"><?php echo $rows['star']?></td>
                              <td class="text-center py-2"><?php echo $rows['response']?> </td>
                              <td><a href="managerresponseform.php?id=<?php echo $rows['id'] ;?>"> <button type="button" class="btn btn-outline-success"><b>Update</b></button></a></td>


                          </tr>
                      <?php
                          }
                      ?>

                              </tbody>
                          </table>
                        </div>
                      </div>
                  </div>
               </div>
               <a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>

             </body>

</html>

<?php

} else {
    header("location:managerlogin.php ");
}
