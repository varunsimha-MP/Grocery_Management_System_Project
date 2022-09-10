<?php
include "dbconnect.php";

$id = $_GET["id"];

$sql = "DELETE FROM card WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:addcardpage.php?message=delete");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
