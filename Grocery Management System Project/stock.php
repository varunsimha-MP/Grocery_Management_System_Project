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
<center>
  <div class="container mt-3">
    <div class="mt-3 p-3 bg-success text-white rounded">
      <h1 class="text-center">MAHALAKSHMI STORES</h1>
  </div>
<hr>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="container-fluid">
   <a class="navbar-brand text-success" href="managerpage.php"><b>Main Page</b></a>
 </nav>
  <hr>
</div>
<div class="container mt-3" style="border: 1px solid black; background-color:#F0f0f0;">
  <br>
<h1 class="text-success">New Item Upload</h1>
<form action="addstock.php" method="post">
<div class="form-floating mb-3 mt-3">
  <input type="text" class="form-control" id="stype" placeholder="Item Type" name="stype" required>
  <label for="stype">Item Type</label>
</div>
<div class="form-floating mb-3 mt-3">
  <input type="text" class="form-control" id="sname" placeholder="Item Name" name="sname" required>
  <label for="sname">Item Name</label>
</div>
<div class="form-floating mb-3 mt-3">
  <input type="number" class="form-control" id="srate" placeholder="Rate Of Item" name="srate" required>
  <label for="srate">Rate Of Item</label>
</div>
<button type="submit" class="btn btn-outline-success"><b>Submit</b></button>
</form>
<br>
</div>
</body>

</html>
<?php

} else {
    header("location:managerlogin.php ");
}
?>
