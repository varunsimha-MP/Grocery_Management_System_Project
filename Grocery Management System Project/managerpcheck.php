<?php
session_start();

$mail = $_POST['mail'];
$password = $_POST['password'];

include "dbconnect2M&C.php";

$query = "SELECT * FROM manager WHERE mail='$mail'";
$result = mysqli_query($mysqli, $query) or die(mysqli_error());
$num_row = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);

if ($num_row >= 1) {

    if (password_verify($password, $row['password'])) {

        $_SESSION['login'] = $row['id'];
        $_SESSION['fname'] = $row['fname'];
        $_SESSION['mail'] = $row['mail'];
        echo 'true';
    }
    else {
        echo 'false';
    }

} else {
    echo 'false';
}

?>
