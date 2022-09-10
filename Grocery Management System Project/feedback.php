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
  <div class="container">
    <div class="mt-3 p-3 bg-success text-white rounded">
      <center>
      <h1>MAHALAKSHMI STORES</h1>
    </center>
    </div>
  <hr>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     <a class="navbar-brand text-success" href="#"><b>Feedback</b></a>
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
        <a class="nav-link text-success" href="customerpageinfo.php"><b>Customer Details</b></a>
      </li>
      </ul>
    </div>
  </div>
  </nav>
<hr>
  <div class="container mt-3" style="border: 1px solid black; background-color:#F0f0f0;">
    <br>
    <?php
    if(isset($_GET["message"])){
      if($_GET["message"]=="successfully")
      {?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <b>Submitted Successfully</b></div>
          <?php }
    }
        ?>
        <?php
        if(isset($_GET["message"])){
          if($_GET["message"]=="error")
          {?>
            <div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <b>Error Not submit</b></div>
              <?php }
        }
            ?>
            <?php
          include "dbconnect.php";
            $sql="SELECT * FROM customerdetails WHERE mail='$mail'";
            $result=$conn->query($sql);
            if($result->num_rows>0){
              while($row=$result->fetch_assoc()){
                $fname=$row["fname"];
                $mail=$row["mail"];
              }
            }
            else {
              echo " 0 Result";
            }
            ?>
    <h2 class="text-success">Customer Feedback</h2>
    <form action="customerfeedback.php" method="post">
      <div class="form-floating mb-3 mt-3">
    <select class="form-select" id="mail" name="mail">
      <option><?php echo $mail;?></option>
    </select>
    <div class="form-floating mb-3 mt-3">
  <select class="form-select" id="fname" name="fname">
    <option><?php echo $fname;?></option>
  </select>
      <div class="form-floating mb-3 mt-3">
        <input type="comment" class="form-control" id="comment" placeholder="comment" name="comment" required>
        <label for="comment">Comment</label>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="hidden" class="form-control" id="response" value="Waiting List" name="response">
          </div>
        <div>Rate the Service
        &nbsp;1 <input type="radio"  id="star" name="star" value="1" required>
        &nbsp;2 <input type="radio"  id="star" name="star" value="2" required>
        &nbsp;3 <input type="radio"  id="star" name="star" value="3" required>
        &nbsp;4 <input type="radio"  id="star" name="star" value="4" required>
        &nbsp;5 <input type="radio" id="star" name="star" value="5" required>
      </div>
        <br>
        <center>
      <button type="submit" class="btn btn-outline-success"><b>Submit</b></button>
    </center>
    <br>
    </form>
</div>
</div>
</div>
 <div class="container mt-3" style="border: 1px solid black; background-color:#F0f0f0;">

<div class="container">
        <h1 class="text-center text-success">Manager Response</h1>
<?php
include "dbconnect.php";
$sql = "SELECT * FROM feedback where mail='$mail'";
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
</body>
</html>
<?php

} else {
    header("location:customerpage.php ");
}
?>
