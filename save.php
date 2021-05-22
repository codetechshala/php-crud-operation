<?php
$id        = $_POST["id"];
$name      = $_POST["name"];
$email     = $_POST["email"];
$gender    = $_POST["gender"];
$address   = $_POST["address"];
$language  = implode(",", $_POST["language"]);
$password  = $_POST["pwd"];
$cpassword = $_POST["pwd-Confirm"];

require_once("connection.php");
if ($id) {
    $sql = "UPDATE student SET name='$name', email='$email', gender='$gender', language='$language', address='$address' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Record Updated Successfully!!!</h1></center>";
    } else {
        echo "Error: " . $conn->error;
    }
} else {
    $encryptedPwd = md5($password);
    $sql = "INSERT INTO student (name, email, password, gender, language, address)
    VALUES ('$name', '$email', '$encryptedPwd', '$gender', '$language', '$address')";
    if ($conn->query($sql) === TRUE) {
        echo "<center><h1>Registration Successful!!!</h1></center>";
    } else {
        echo "Error: " . $conn->error;
    }
}
require_once("connection_close.php");