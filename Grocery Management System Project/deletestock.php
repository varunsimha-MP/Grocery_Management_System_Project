<?php
include "dbconnect.php";

$id = $_GET["id"];

$sql = "DELETE FROM stock WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:updatestockstatus.php?message=delete");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
