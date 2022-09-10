<?php
include "dbconnect.php";

$id = $_GET["id"];

// sql to delete a record
$sql = "DELETE FROM personalinfo WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:delete.php?message=delete");
} else {
    echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>
