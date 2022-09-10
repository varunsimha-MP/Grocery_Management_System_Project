<?php
include "dbconnect.php";

$cpassword=val($_POST["mpassword"]);;
$mail=val($_POST["mail"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
$spassword = password_hash($cpassword, PASSWORD_BCRYPT, array('cost' => 12));
$sql="UPDATE manager SET password='$spassword' WHERE mail='$mail' ";
if($conn->query($sql)===TRUE){
header("location:managerpage.php?message=changepasswordsuccessfully");
}
else {
  echo "ERROR".$conn->error;
  $conn->close();
}
?>
