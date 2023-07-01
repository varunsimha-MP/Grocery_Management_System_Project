<?php
$mail=val($_POST["mail"]);
$fname=val($_POST["fname"]);
$comment=val($_POST["comment"]);
$star=val($_POST["star"]);
$response=val($_POST["response"]);
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
include "dbconnect.php";
$sql="INSERT INTO feedback (mail,fname,comment,star,response)VALUES('$mail','$fname','$comment','$star','$response')";
if($conn->query($sql)===TRUE){
  header("Location:feedback.php?message=successfully");
}else{
  header("Location:feedback.php?message=error");
}
$conn->close();
?>
