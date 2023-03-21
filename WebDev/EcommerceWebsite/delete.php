<?php                   // page for deleting a user, accessible for both user and admin
session_start();
include ("db_connection.php");

if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
 }

if (isset($_GET['deleteid'])) { //get ID from the value posted in display.php (the one in delete.php?deleteid=".$result['CustomerID'].)
    $id = $_GET['deleteid'];    //set $id as a variable to store the id of the user to be deleted

    $sql = "delete from `logintable` where `CustomerID`=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        if ($user['UserType'] == 0) { //if user is found to be a normal user then it would head to the landing page
            header('location: index.php');
        }
        header('location:display.php'); //if user is an admin then they would be taken back to the admin panel
    } else {
        die (mysqli_error($conn));
    }
}
?>