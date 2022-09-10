<?php
$fname=val($_POST["fname"]);
$pnumber=val($_POST["pnumber"]);
$mail=val($_POST["mail"]);
$paddress=val($_POST["paddress"]);
$waddress=val($_POST["waddress"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
include "dbconnect.php";
$sql="INSERT INTO customerdetails (fname,pnumber,mail,paddress,waddress)VALUES('$fname','$pnumber','$mail','$paddress','$waddress')";
if($conn->query($sql)===TRUE){
  header("Location:customerpage.php?message=successfully");
}else{
  header("Location:customerpage.php?message=error");
}
$conn->close();
?>
