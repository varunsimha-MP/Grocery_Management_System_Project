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
     <a class="navbar-brand text-success" href="#"><b>Home Page</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="customerlogin.php"><b>Customer Login</b></a>
        </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-success" href="managerlogin.php"><b>Manager Login</b></a>
        </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>

          <li class="nav-item">
            <a class="nav-link text-success" href="aboutus.html"><b>About Us</b></a>
          </li>
  </ul>
    </div>
  </div>
  </nav>
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
   <a href="customerlogin.php"> <img src="uploads/'.$row["cimage"].'" alt="'.$row["id"].'" /></a>
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
<div class="container">
<?php
$sql="SELECT * FROM stock order by stype";
$result = mysqli_query($conn,$sql);
?>
<div class="row">
              <?php
            while($rows=mysqli_fetch_assoc($result)){
        ?>
              <div class="col-sm-4">
                  <div class="table-responsive-sm">
                  <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                    <tr>
                      <td><a href="customerlogin.php" class="text-success text-center py-2"><h3><b><?php echo $rows['stype']?></b></h3></a></td>
                    </tr>
                    <tr>
                      <td class="text-center py-2"><a href="customerlogin.php"><img src="uploads/<?php echo $rows['simage']; ?>" width="200px" height="200px"></a></td>
</tr>
                    <tr>
                      <td class="text-center py-2"><a href="customerlogin.php" class="text-success py-2"><b>Item Name: <?php echo $rows['sname']?></b></a></td>
                    </tr>
                    <tr>
                      <td class="text-center py-2"><a href="customerlogin.php" class="text-success py-2"><b>Rate Per Item: &#x20B9;<?php echo $rows['srate']?></b></a></td>
                    </tr>
                    <tr>
                      <td class="text-center py-2"><a href="customerlogin.php" class="text-success py-2"><button type="submit" class="btn btn-success"><b>Buy Now</b></button></a></td>
                    </tr>
                  </table>
                </div>
              </div>
            <?php } ?>
</div>
<a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>
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
