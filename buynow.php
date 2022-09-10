<?php
include "dbconnect.php";
    $mail = $_GET["mail"];
    $sql="INSERT INTO purchasehistory(mail,sname,quantity,srate,amount,status,cash,simage) select cd.mail,sname,quantity,srate,amount,status,cash,simage from card c,customerdetails cd where cd.mail='$mail' and c.mail='$mail' ";
      if($conn->query($sql)===TRUE){
        $sql2 = "DELETE FROM card WHERE mail='$mail'";
      if($conn->query($sql2)===TRUE){
      header("Location:buy.php?message=successfully");
    }else{
      header("Location:buy.php?message=error");
    }
  }
    $conn->close();
    ?>
