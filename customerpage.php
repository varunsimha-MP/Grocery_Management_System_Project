<?php
session_start();

if (isset($_SESSION['login'])) {
   $mail = $_SESSION['mail'];
    $fname = $_SESSION['fname'];

    include "dbconnect.php";
    $sql = "SELECT * FROM customerdetails where mail='$mail' ";
    $result = $conn->query($sql);
      $row = mysqli_num_rows($result);
        if($rows=mysqli_fetch_assoc($result)==0){
            header("Location:customerdetailslogin.php");
}
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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
     <a class="navbar-brand text-success" href="#"><b>Main Page</b></a>
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
        </li>  <li class="nav-item">
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
      <a class="nav-link text-danger" href="changepassword.php"><b>Change Password</b></a>
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
if(isset($_GET["message"])){
  if($_GET["message"]=="successfully")
  {?>
    <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
      <b>Successfully Login.</b></div>
      <?php }
}
    ?>
    <?php
    if(isset($_GET["message"])){
      if($_GET["message"]=="changepasswordsuccessfully")
      {?>
        <div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <b>Password has been changed Successfully.</b></div>
          <?php }
    }
        ?>
    <h5 class="text-center text-success">Customer E-Mail Id:<?php echo $mail;?></h5>
    <hr>
    <?php
    include "dbconnect.php";
    function make_query($conn)
    {
     $query = "SELECT * FROM carousel";
     $result = mysqli_query($conn, $query);
     return $result;
    }

    function make_slide_indicators($conn)
    {
     $output = '';
     $count = 0;
     $result = make_query($conn);
     while($row = mysqli_fetch_array($result))
     {
      if($count == 0)
      {
       $output .= '
       <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'" class="active"></li>
       ';
      }
      else
      {
       $output .= '
       <li data-target="#dynamic_slide_show" data-slide-to="'.$count.'"></li>
       ';
      }
      $count = $count + 1;
     }
     return $output;
    }

    function make_slides($conn)
    {
     $output = '';
     $count = 0;
     $result = make_query($conn);
     while($row = mysqli_fetch_array($result))
     {
      if($count == 0)
      {
       $output .= '<div class="item active">';
      }
      else
      {
       $output .= '<div class="item">';
      }
      $output .= '
       <img src="uploads/'.$row["cimage"].'" alt="'.$row["id"].'" />
      </div>
      ';
      $count = $count + 1;
     }
     return $output;
    }

    ?>
    <div id="dynamic_slide_show" class="carousel slide" data-ride="carousel">
     <ol class="carousel-indicators">
     <?php echo make_slide_indicators($conn); ?>
     </ol>

     <div class="carousel-inner">
      <?php echo make_slides($conn); ?>
     </div>
     <a class="left carousel-control" href="#dynamic_slide_show" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
     </a>

     <a class="right carousel-control" href="#dynamic_slide_show" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
     </a>

    </div>

<hr>
<?php
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
</div><br>
<a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>
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
    header("location:customerpage.php ");
}
?>
