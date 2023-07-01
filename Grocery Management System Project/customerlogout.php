<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['fname']);
unset($_SESSION['mail']);

header("location:customerlogin.php?logout=true");
?>
