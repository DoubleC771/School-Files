<?php
session_start();
include ("db_connection.php");

if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
 }

if (isset($_GET['deleteid'])) {
    $id = $_GET['deleteid'];

    $sql = "delete from `logintable` where `CustomerID`=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if ($user['UserType'] == 0) {
            header('location: index.php');
        }
        header('location:display.php');
    } else {
        die (mysqli_error($conn));
    }
}
?>