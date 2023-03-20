<?php
session_start();
include("db_connection.php");
$total = $_SESSION['total'];
$select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
$result = mysqli_fetch_assoc($select_cart);

if (isset($_POST['update_update_btn'])) {
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
    $result = mysqli_fetch_assoc($select_cart);
    $update_stocks = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];

    print_r($_POST['update_quantity']);

    $stock_decrease = mysqli_query($conn, "UPDATE `bikeorder` SET `Quantity` = '$updatedstock' WHERE `OrderID` = '$update_id'");
    if ($stock_decrease) {
        header('location:shoppingcart.php');
    } else {
        print_r($update_stocks);
        die (mysqli_error($conn));
        
    }
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Login</title>
	  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p> You are now ₱<?php echo number_format($total)?> in debt!</p>
        <hr>
        <?php
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
        if (mysqli_num_rows($select_cart) > 0) {
                    while ($result = mysqli_fetch_assoc($select_cart)) {
                ?>

                    <p class="mb-0">You have purchased <?php echo $result['Quantity'];?>x <?php echo $result['BikeName']; ?> </p>
                    <input type = "hidden" name = "update_quantity_id" value = "<?php echo $result['OrderID']; ?> ">
                    <input type = "hidden" name = "update_quantity" value = "<?php $result['Quantity']; ?> "> 

                <?php 
                    };
                }  ?>

                    <hr>
                    <p class="mb-0"> Deducting available stocks with quantity bought..... </p>
    </div>
</div>
</body>
</html>