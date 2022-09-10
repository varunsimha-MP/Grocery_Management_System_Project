<?php
session_start();

if (isset($_SESSION['login'])) {

    $mail = $_SESSION['mail'];
    $fname = $_SESSION['fname'];
include "dbconnect.php";
$id = $_GET["id"];
$sql="SELECT * FROM stock WHERE id='$id'";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $stype=$row["stype"];
    $sname=$row["sname"];
    $srate=$row["srate"];
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
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a href="managerpage.php" class="btn btn-outline-success"><b>Main Page</b></a>
            </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a>&nbsp;</a>
        </li>
        <li class="nav-item">
          <a href="managerlogout.php" class="btn btn-outline-danger"><b>Logout</b></a>
        </li>
      </ul>
  <hr>
</div>
<div class="container mt-3" style="border: 1px solid black; background-color:#F0f0f0;">
  <br>
<h1 class="text-success">New Item Upload</h1>
<form action="updatestock.php" method="post">
<div class="form-floating mb-3 mt-3">
  <input type="text" class="form-control" id="stype" placeholder="Item Type" name="stype" value="<?php echo $stype;?>" required>
  <label for="stype">Item Type</label>
</div>
<div class="form-floating mb-3 mt-3">
  <input type="text" class="form-control" id="sname" placeholder="Item Name" name="sname" value="<?php echo $sname;?>" required>
  <label for="sname">Item Name</label>
</div>
<div class="form-floating mb-3 mt-3">
  <input type="number" class="form-control" id="srate" placeholder="Rate Of Item" name="srate" value="<?php echo $srate;?>" required>
  <label for="srate">Rate Of Item</label>
</div>
<button type="submit" class="btn btn-outline-success"><b>Update</b></button>
<input type="hidden" name="id" value="<?php echo $id;?>" >
<a href="updatestockstatus.php"> <button type="button" class="btn btn-outline-success"><b>Back</b></button></a>
</form>
<br>
</div>
</center>
<?php
} else {
header("location:managerlogin.php ");
}
?>
</body>
</html>
