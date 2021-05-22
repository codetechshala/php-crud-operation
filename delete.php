<?php
require_once("connection.php");
$id = $_GET["id"] ?? "";
if ($id) {
    $sql = "DELETE from student WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Student Deleted Successfully!!!</h1></center>";
    } else {
        echo "Error: " . $conn->error;
    }
}
require_once("connection_close.php"); 