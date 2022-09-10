<?php
session_start();
include "dbconnect2M&C.php";

$fname = mysqli_real_escape_string($mysqli, $_POST['fname']);
$mail = mysqli_real_escape_string($mysqli, $_POST['mail']);
$password = mysqli_real_escape_string($mysqli, $_POST['password']);

if (strlen($fname) < 2) {
    echo 'fname';
} elseif (strlen($mail) <= 4) {
    echo 'eshort';
} elseif (strlen($password) <= 4) {
    echo 'pshort';

} else {

	$spassword = password_hash($password, PASSWORD_BCRYPT, array('cost' => 12));

	$query = "SELECT * FROM customerid WHERE mail='$mail'";
	$result = mysqli_query($mysqli, $query) or die(mysqli_error());
	$num_row = mysqli_num_rows($result);
	$row = mysqli_fetch_array($result);

		if ($num_row < 1) {

			$insert_row = $mysqli->query("INSERT INTO customerid (fname, mail, password) VALUES ('$fname', '$mail','$spassword')");

			if ($insert_row) {

				$_SESSION['login'] = $mysqli->insert_id;
        $_SESSION['mail'] = $mail;
				$_SESSION['fname'] = $fname;

				echo 'true';

			}

		} else {

			echo 'false';

		}

}

?>
