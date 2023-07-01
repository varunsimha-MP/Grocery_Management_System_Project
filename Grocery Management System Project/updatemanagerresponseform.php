<?php
include "dbconnect.php";

$response=val($_POST["response"]);
$id=val($_POST["id"]);

function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
$sql="UPDATE feedback SET response='$response' WHERE id='$id' ";
if($conn->query($sql)===TRUE){
header("location:feedbackretrive.php");
}
else {
  echo "ERROR".$conn->error;
  $conn->close();
}
?>
