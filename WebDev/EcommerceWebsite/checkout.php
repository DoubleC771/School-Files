<?php
session_start();
include("db_connection.php");

if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    $admin = $user['UserType'] == 1;
    $norm = $user['UserType'] == 0;
}

$select_cart = mysqli_query($conn, "SELECT * FROM `cart`"); // Select items from the cart
$total = 0; // Initialize total variable
$cart_count = mysqli_num_rows($select_cart); // Get the count of items in the cart

if (isset($_POST['salesreport'])) {
    while ($result = mysqli_fetch_assoc($select_cart)) {
        $product_id = $result['OrderID'];
        $product_quantity = $result['Quantity'];
        $update_stocks = "UPDATE bikeorder SET Stocks = Stocks - $product_quantity WHERE OrderID = $product_id";
        mysqli_query($conn, $update_stocks);
        
        $product_name = $result['BikeName'];
        $product_price = $result['Price'];
        $product_image = $result['Image'];
        $product_quantity = $result['Quantity'];
        $date = date('Y-m-d');
        $time = date('H:i:s');
        
        $sql = "INSERT INTO salesreport (BikeName, Price, Image, Quantity, date, time) 
                VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity', '$date', '$time')";
        
        mysqli_query($conn, $sql);
    }

    $erase = "TRUNCATE TABLE cart";
    mysqli_query($conn, $erase);

    echo '<div class="alert alert-success" role="alert">
        Thank you for your purchase!
    </div>';

    // Reset the $select_cart variable after the purchase
    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
    $cart_count = mysqli_num_rows($select_cart);
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Checkout Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container checkout-container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <h2 class="mt-4 checkout-heading">Checkout</h2>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            while ($result = mysqli_fetch_assoc($select_cart)) {
                                echo '<tr>';
                                echo '<td>' . $result['BikeName'] . '</td>';
                                echo '<td>₱' . $result['Price'] . '</td>';
                                echo '<td>' . $result['Quantity'] . '</td>';
                                echo '</tr>';

                                $total += $result['Price'] * $result['Quantity'];
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <h4 class="checkout-total">Total: ₱<?php echo number_format($total, 2); ?></h4>
                <?php if ($cart_count > 0) { ?>
                    <div class="text-center">
                        <form action="" method="post">
                            <button type="submit" class="btn btn-primary checkout-btn checkout-btn-primary" name="salesreport">Purchase</button>
                            <a href="cycle.php" class="btn btn-secondary checkout-btn">Cancel</a>
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-warning text-center" role="alert">
                        Your cart is empty.
                    </div>
                    <div class="text-center">
                        <a href="cycle.php" class="btn btn-secondary checkout-btn">Back to Shop</a>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</body>

</html>
