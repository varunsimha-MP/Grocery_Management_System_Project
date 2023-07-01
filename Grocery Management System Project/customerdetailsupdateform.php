<?php
session_start();

if (isset($_SESSION['login'])) {
  $mail=$_SESSION['mail'];
    $fname = $_SESSION['fname'];

include "dbconnect.php";
$id = $_GET["id"];
$sql="SELECT * FROM customerdetails WHERE id='$id'";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $fname=$row["fname"];
    $pnumber=$row["pnumber"];
    $mail=$row["mail"];
    $paddress=$row["paddress"];
    $waddress=$row["waddress"];
  }
}
else {
  echo " 0 Result";
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
  <script type="text/javascript" src="validate.js">
</script>
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
</div>
<div class="container mt-3" style="border: 1px solid black; background-color:#F0f0f0;">
  <br>
  <h1 class="text-black">Customer Details</h1>
  <h5 class="text-success">Full Name: <?php echo $fname;?></h5>
<h5 class="text-success">Mail Id: <?php echo $mail;?></h5>
  <form action="updatecustomerdetails.php" method="post">
    <div class="form-floating mb-3 mt-3">
      <input type="number" class="form-control" id="pnumber" placeholder="Phone Number" name="pnumber" value="<?php echo $pnumber;?>"required>
      <label for="pnumber">Phone Number</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="paddress" placeholder="Permanent Address" name="paddress" value="<?php echo $paddress;?>"required>
      <label for="paddress">Permanent Address</label>
    </div>
    <div class="form-floating mt-3 mb-3">
      <input type="text" class="form-control" id="waddress" placeholder="Work Place(Optional)" name="waddress" value="<?php echo $waddress;?>">
      <label for="waddress">Work Place(Optional)</label>
    </div>
    <input type="submit" value="update" class="btn btn-outline-success"><br><br>
    <input type="hidden" name="id" value="<?php echo $id;?>" >
    <a href="customerpageinfo.php"> <button type="button" class="btn btn-outline-success">Back</button></a>
  </form>
  <br>
</div>
</center>
<?php
} else {
    header("location:customerlogin.php ");
}
?>
</body>
</html>
