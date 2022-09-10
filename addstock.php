<?php
$stype=val($_POST["stype"]);
$sname=val($_POST["sname"]);
$srate=val($_POST["srate"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
include "dbconnect.php";
$sql="INSERT INTO stock (stype,sname,srate)VALUES('$stype','$sname','$srate')";
if($conn->query($sql)===TRUE){
  header("Location:updatestockstatus.php?message=successfully");
}else{
  header("Location:managerpage.php?message=error");
}
$conn->close();
?>
