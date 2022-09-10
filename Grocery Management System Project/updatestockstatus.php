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
     <a class="navbar-brand text-success" href="#"><b>Update Status</b></a>
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
        <a class="nav-link text-success" href="stock.php"><b>Upload Stock</b></a>
      </li>
  <li class="nav-item">
    <a>&nbsp;</a>
  </li>
  <li class="nav-item">
    <a class="nav-link text-success" href="deliverystatus.php"><b>Delivery Status</b></a>
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
      <b>New Stock Loaded Successfully Please Upload the Picture of Item</b></div>
      <?php }
}
if(isset($_GET["message"])){
  if($_GET["message"]=="updatesuccessfully")
  {?>
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <b>Stock Update Successfully</b></div>
      <?php }
}
        if(isset($_GET["message"])){
          if($_GET["message"]=="delete")
          {?>
            <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
              <b>Successfully Delete Stock</b></div>
              <?php }
        }
include "dbconnect.php";
$sql="SELECT * FROM stock order by stype";
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
                      <td class="text-success py-2"><h3><b><?php echo $rows['stype']?></b></h3></td>
                    </tr>
                    <tr>
                      <td class="text-center py-2"><img src="uploads/<?php echo $rows['simage']; ?>" width="200px" height="200px"></td>
</tr>
                    <tr>
                      <td class="text-center py-2"><b>Item Name: <?php echo $rows['sname']?></b></td>
                    </tr>
                    <tr>
                      <td class="text-center py-2"><b>Rate Per Item: &#x20B9;<?php echo $rows['srate']?></b></td>
                    </tr>
                    <tr>
                        <td class="text-center py-2"><a href="uploadimage.php?id= <?php echo $rows['id'] ;?>" class="btn btn-outline-success"><b>Upload Image</b></a></td>
                      </tr>
                      <tr>
                      <td class="text-center py-2"><a href="updatestockform.php?id= <?php echo $rows['id'] ;?>" class="btn btn-outline-success"><b>Update</b></a>
                      </td>
                      <tr>
                      <td class="text-center py-2"><a href="deletestock.php?id= <?php echo $rows['id'] ;?>" class="btn btn-outline-danger"><b>Delete</b></a>
                      </td>
</tr>
                  </table>
                </div>
              </div>
            <?php } ?>
</div>               <a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>

<br>

<div class="container">
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
    header("location:managerpage.php ");
}
?>
