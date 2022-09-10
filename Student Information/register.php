<?php
include "dbconnect.php";
$fname=val($_POST["fname"]);
$lname=val($_POST["lname"]);
$a=val($_POST["a"]);
$radio=val($_POST["radio"]);
$sem=val($_POST["sem"]);
$male=val($_POST["male"]);
$mail=val($_POST["mail"]);
$phone=val($_POST["phone"]);
$dob=val($_POST["dob"]);
$file=val($_POST["file"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
$sql="INSERT INTO personalinfo (firstname,lastname,usn,branch,semester,gender,mail,phone,dob,image)VALUES('$fname','$lname','$a','$radio','$sem','$male','$mail','$phone','$dob','$file')";
if($conn->query($sql)===TRUE){
  header("Location:delete.php");
}else{
  echo "Error".$sq."<br>".$conn->error;
}
$conn->close();
?>
