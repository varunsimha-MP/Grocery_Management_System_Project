<?php
include "dbconnect.php";
$pnumber=val($_POST["pnumber"]);
$paddress=val($_POST["paddress"]);
$caddress=val($_POST["caddress"]);
$id=val($_POST["id"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
$sql="UPDATE customerdetails SET pnumber='$pnumber',paddress='$paddress',waddress='$waddress' WHERE id='$id' ";
if($conn->query($sql)===TRUE){
header("location:customerpageinfo.php?message=updatesuccessfully");
}
else {
  echo "ERROR".$conn->error;
  $conn->close();
}
?>
