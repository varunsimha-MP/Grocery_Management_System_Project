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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
<center>
<div class="container">
        <div class="mt-3 p-3 bg-success text-white rounded">

          <h1>MAHALAKSHMI STORES</h1>
        </div>
  <hr>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
     <a class="navbar-brand text-success" href="#"><b>Upload Image</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
        <a class="nav-link text-success" href="managerpage.php"><b>Main Page</b></a>
      </li>
  <li class="nav-item">
    <a>&nbsp;</a>
  </li>
      <li class="nav-item">
        <a class="nav-link text-success" href="updatestockstatus.php"><b>Update Status</b></a>
      </li>
      </ul>
    </div>
  </div>
  </nav>
</div>
<div class="container">
<hr>
  <?php

include "dbconnectimage.php";
$id = $_GET["id"];
if(isset($_POST['ok']))

{

$folder ="uploads/";

$simage = $_FILES['simage']['name'];

$path = $folder . $simage ;

$target_file=$folder.basename($_FILES["simage"]["name"]);


$simageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


$allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['simage']['name'];

$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) )

{

 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

}

else{

move_uploaded_file( $_FILES['simage'] ['tmp_name'], $path);

$sth=$con->prepare("update stock set simage='$simage' where id='$id' ");

$sth->execute();
}

}

?>
<h1 class="text-success">New Item Upload</h1>
<hr>
<form method="post" enctype="multipart/form-data">
<div class="form-floating mb-3 mt-3">
<input type="file" name="simage" value="<?php echo $simage;?>" required>
<button type="submit" name="ok" class="btn btn-outline-success"><b>Update</b></button>
<input type="hidden" name="id" value="<?php echo $id;?>" >
<a href="updatestockstatus.php"> <button type="button" class="btn btn-outline-success"><b>Back</b></button></a>
</form>
<br>
</div>
<?php

} else {
    header("location:managerlogin.php ");
}
?>
