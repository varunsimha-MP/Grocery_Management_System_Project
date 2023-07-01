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
     <a class="navbar-brand text-success" href="#"><b>Cart</b></a>
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
    <a class="nav-link text-success" href="buy.php"><b>My Orders</b></a>
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
        <?php
     include "dbconnect.php";
          $sql = "SELECT * FROM card where mail='$mail'";
          $result = $conn->query($sql);
            if($row = mysqli_num_rows($result)>0){
            ?>
            <div class="row-sm-8">
                          <?php
                        while($rows=mysqli_fetch_assoc($result)){
                    ?>
                          <div class="col-sm-8">
                              <div class="table-responsive-sm">
                              <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                                <tr >
                                  <td colspan="2" class="text-success text-center py-2"><h3><b><?php echo $rows['sname']?></b></h3></td>
                                  <td class="text-center py-2"><a href="deletecard.php?id=<?php echo $rows["id"]?>"><button type="button" class="btn btn-outline-danger"><b>Delete Item</b></button></a>

                                </tr>
                                <tr>
                                  <td colspan="3" class="text-center py-2"><img src="uploads/<?php echo $rows['simage']; ?>" width="200px" height="200px"></td>
            </tr>
                                <tr>
                                  <td colspan="2" class="text-center py-2"><b>Quantity: </b></td>
                                  <td class="text-center py-2"><b><?php echo $rows['quantity']?></b></td>
                                </tr>
                                <tr>
                                  <td colspan="2" class="text-center py-2"><b>Per Item Rate: </b></td>
                                  <td class="text-center py-2"><b><?php echo $rows['srate']?></b></td>

                                </tr>
                                <tr>
                                  <td colspan="2" class="text-center py-2"><b>Amount: </b></td>
                                  <td class="text-center py-2"><b><?php echo $rows['amount']?></b></td>

                                  </tr>
                                  <tr>
                                    <td colspan="2" class="text-center py-2"><b>Payment: </b></td>
                                    <td class="text-center py-2"><b><?php echo $rows['cash']?></b></td>

                                  </td>
                                  <tr>
                                  </td>
            </tr>
          </tbody>
      </table>
    </div>

                          <div  class="row">
                          <div class="col">
                              <div class="table-responsive-sm">
                              <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                                <tr >
                                   <?php }
                                   $sql = "SELECT sum(amount),mail FROM card where mail='$mail'";
                                   $result = mysqli_query($conn,$sql);
                                   $rows=mysqli_fetch_assoc($result);
                                        if($rows['sum(amount)']>300){ ?>
                                             <tr>
                                               <th colspan="2" class="text-center py-2">Total Amount</th>
                                                   <th class="text-center py-2">&#x20B9;<?php echo $rows['sum(amount)']?></th></tr>
                                                   <tr>
                                                   <td colspan="3" class="text-center py-2"><a href="buynow.php?mail=<?php echo $rows["mail"]?>"><button type="button" class="btn btn-outline-success"><b>Buy Now</b></button></a>
                                             </tr>
                                            <?php }
                                            else { ?>
                                                 <tr>
                                                   <th class="text-center py-2">Total Amount</th>
                                                   <?php
                                                           $sql = "SELECT sum(amount),mail FROM card where mail='$mail'";
                                                           $result = mysqli_query($conn,$sql);
                                                           $rows=mysqli_fetch_assoc($result);
                                                       ?>
                                                       <th class="text-center py-2">&#x20B9;<?php echo 100+$rows['sum(amount)']?></th>
                                                     </tr>
                                                      <tr> <td colspan="3" class="text-center py-2">
                                                        <button type="button" class="btn btn-outline-success disabled"><b>Buy Now</b></button>
                                                        <p>You Need to Buy minmum of <b>300&#x20B9;</b></P>
                                                 </tr>
                                        <?php    }?>
                                          </tbody>
                                      </table>
                                    </div>
                                  </div>
                              </div>
                              <p><b>Note:</b>Once You Buy <b>No Return/Replacement</b> Done Here</P>
                              <a href="customerpage.php" class="btn btn-outline-success"><b>Shop More</b></a><br><br>

<?php }
else{
  ?><br>
  <h3 class="text-center">Your cart is Empty!</h3><br>
  <a href="customerpage.php" class="btn btn-outline-success"><b>Shop Now</b></a>

<?php
} ?>
             </div>
             <a href="#"><div class="scrollTop rounded"><b>&#8593;</b></div></a>
</body>
</html>
<?php

} else {
    header("location:customerpage.php ");
}
?>
