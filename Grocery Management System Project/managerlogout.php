<?php
session_start();
unset($_SESSION['login']);
unset($_SESSION['fname']);
unset($_SESSION['mail']);

header("location:managerlogin.php?logout=true");
?>
