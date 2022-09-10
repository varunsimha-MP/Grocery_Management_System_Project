<?php
include "dbconnect.php";
$status=val($_POST["status"]);
$pid=val($_POST["pid"]);

function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
$sql="UPDATE purchasehistory SET status='$status' WHERE pid='$pid' ";
if($conn->query($sql)===TRUE){
header("location:deliverystatus.php");
}
else {
  echo "ERROR".$conn->error;
  $conn->close();
}
?>
