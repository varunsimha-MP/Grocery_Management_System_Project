<?php
include "dbconnect.php";
$stype=val($_POST["stype"]);
$sname=val($_POST["sname"]);
$srate=val($_POST["srate"]);
$id=val($_POST["id"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
$sql="UPDATE stock SET stype='$stype',sname='$sname',srate='$srate' WHERE id='$id' ";
if($conn->query($sql)===TRUE){
header("location:updatestockstatus.php?message=updatesuccessfully");
}
else {
  echo "ERROR".$conn->error;
  $conn->close();
}
?>
