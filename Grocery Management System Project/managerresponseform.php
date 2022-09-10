<?php
session_start();

if (isset($_SESSION['login'])) {
  $mail=$_SESSION['mail'];
    $fname = $_SESSION['fname'];

include "dbconnect.php";
$id = $_GET["id"];
$sql="SELECT * FROM feedback WHERE id='$id'";
$result=$conn->query($sql);
if($result->num_rows>0){
  while($row=$result->fetch_assoc()){
    $response=$row["response"];
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
  <h1 class="text-success">Manager Response</h1>
  <form action="updatemanagerresponseform.php" method="post">
    <div class="form-floating mb-3 mt-3">
  <select class="form-select" id="response" name="response">
    <option>In Progress</option>
    <option>Solved</option>

  </select>
  <label for="response" class="form-label">Manager Response</label>
</div>
<input type="hidden" name="id" value="<?php echo $id;?>" >
    <input type="submit" value="Update" class="btn btn-outline-success"><br><br>
  </form>
  <a href="feedbackretrive.php"> <button type="button" class="btn btn-outline-success">Back</button></a>
  <br>
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
