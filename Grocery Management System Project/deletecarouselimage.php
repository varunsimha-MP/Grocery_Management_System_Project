<?php
include "dbconnect.php";

$id = $_GET["id"];

$sql = "DELETE FROM carousel WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:addcarousel.php?message=delete");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
