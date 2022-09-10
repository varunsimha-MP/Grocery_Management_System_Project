<?php
$mail=val($_POST["mail"]);
$sname=val($_POST["sname"]);
$quantity=val($_POST["quantity"]);
$srate=val($_POST["srate"]);
$status=val($_POST["status"]);
$cash=val($_POST["cash"]);
$simage=val($_POST["simage"]);
$amount = $srate * $quantity;
function val($data){
  $data=trim($data);
  $data=stripslashes($data);
  $data=htmlspecialchars($data);
  return $data;
}
include "dbconnect.php";

$sql="INSERT INTO card (mail,sname,quantity,srate,amount,status,cash,simage)VALUES('$mail','$sname','$quantity','$srate','$amount','$status','$cash','$simage')";
if($conn->query($sql)===TRUE){
  header("Location:addcardpage.php");
}else{
  header("Location:addcardpage.php");
}
$conn->close();
?>
