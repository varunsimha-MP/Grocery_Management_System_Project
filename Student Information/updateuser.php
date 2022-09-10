<?php
$fname=val($_POST["fname"]);
$lname=val($_POST["lname"]);
$a=val($_POST["a"]);
$radio=val($_POST["radio"]);
$sem=val($_POST["sem"]);
$male=val($_POST["male"]);
$mail=val($_POST["mail"]);
$phone=val($_POST["phone"]);
$dob=val($_POST["dob"]);
$id=val($_POST["id"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
include "dbconnect.php";
$sql="UPDATE personalinfo SET firstname='$fname',lastname='$lname',usn='$a',branch='$radio',semester='$sem',gender='$male',mail='$mail',phone='$phone',dob='$dob' WHERE id='$id' ";
if($conn->query($sql)===TRUE){
header("location:delete.php?message=successfully");
}
else {
  echo "ERROR".$conn->error;
  $conn->close();
}
?>
