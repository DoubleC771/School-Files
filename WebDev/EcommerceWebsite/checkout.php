<?php                                   // checkout page
session_start();
include("db_connection.php");
$total = $_SESSION['total'];            // get total from session (refer to shoppingcart.php where we store $total to session).
if (isset($_SESSION["user_id"])) {
    $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
    $result = $conn->query($sql);
    $user = $result->fetch_assoc();
    $admin = $user['UserType'] == 1;
    $norm = $user['UserType'] == 0;
 }
$select_cart = mysqli_query($conn, "SELECT * FROM `cart`");   //select item from cart  
$result = mysqli_fetch_assoc($select_cart);     //fetch information about cart from database

if (isset($_POST['salesreport'])) {
    $product_name = $_POST['product_name'];  
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];
    $product_quantity = $_POST['product_quantity'];
    $product_id = $_POST['product_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    $select_salesreport = mysqli_query($conn, "SELECT * FROM `salesreport` WHERE `BikeName` = '$product_name'");

    $sql = "INSERT INTO salesreport (BikeName, Price, Image, Quantity, date, time) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity', '$date', '$time')";

    $update_stocks = "UPDATE bikeorder SET Stocks = Stocks - $product_quantity WHERE OrderID = $product_id";
    
    $erase = "Truncate TABLE cart";

    if (mysqli_num_rows($select_salesreport) > 0) {
        $result = mysqli_query($conn, $sql);
        $updatestocks = mysqli_query($conn, $update_stocks);
        echo '<div class="alert alert-success" role="alert">
        Thank you for da money, mister <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
        $yeetus = mysqli_query($conn, $erase);
     } else {
        $result = mysqli_query($conn, $sql);
        $updatestocks = mysqli_query($conn, $update_stocks);
        echo '<div class="alert alert-success" role="alert">
        Thank you for da money, mister <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
      </div>';
        $yeetus = mysqli_query($conn, $erase);
     }
}
$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die ("Query Failed");
$cart_count = mysqli_num_rows($select_rows);
?>

<!DOCTYPE html>
<html>
<head>
    <!-- styleeeehssseeeeeeeet -->
	<title>Checkout Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
    <!-- yoinked this from bootstrap -->
    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Well done!</h4>
        <p> You are now ₱<?php echo number_format($total)?> in debt!</p> <!-- prints the total stored from session (refer to $total from shoppingcart) -->
        <hr>
        <?php // prints out the items from cart if the number of rows are greater than 0. Basically, it displays an item if there is an item present in the database. If not, it woudl display nothing.
        $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
        if (mysqli_num_rows($select_cart) > 0) {
                    while ($result = mysqli_fetch_assoc($select_cart)) {    //fetches information about the cart from database. $result['any column in ur database'] can now be used to display sht from ur database
                ?>
                <form action = "" method = "post">
                    <p class="mb-0">You have purchased <?php echo $result['Quantity'];?>x <?php echo $result['BikeName']; ?> </p>
                    <input type = "hidden" name = "update_quantity_id" value = "<?php echo $result['OrderID']; ?> ">
                    <input type = "hidden" name = "update_quantity" value = "<?php $result['Quantity']; ?> "> 
                    
                    <!-- sales report section hidden inputs -->

                    <input type="hidden" name = "product_name" value = "<?php echo $result["BikeName"]; ?>">
                    <input type="hidden" name = "product_price" value = "<?php echo $result["Price"]; ?>">
                    <input type="hidden" name = "product_image" value = "<?php echo $result["Image"]; ?>">
                    <input type="hidden" name = "product_quantity" value = "<?php echo $result["Quantity"]; ?>">
                    <input type="hidden" name = "product_id" value = "<?php echo $result["OrderID"]; ?>">
                    <input type="hidden" id="date" name="date" value="CurrentTime"> 
                    <input type="hidden" id="time" name="time" value="CurrentDate"> 
                    <!-- ignore the hidden input types, it is used for decreasing stocks but it is incomplete -->
                    <input type ="submit" class = "btn btn-primary" value = "Agree to pay ₱<?php echo number_format($total)?>" name = "salesreport">
                    </form>
                <?php 
                    };
                }  ?>
                <td><a href = "cycle.php" class = "btn btn-info"> Continue Shopping? </a></td>
                    <hr>
    </div>
</div>
<script = "text/javascript"> 
        var d = new Date();

// Set the value of the "date" field
        document.getElementById("date").value = d.toDateString();

// Set the value of the "time" field
        var hours = d.getHours();
        var mins = d.getMinutes();
        var seconds = d.getSeconds();
        document.getElementById("time").value = hours + ":" + mins + ":" + seconds;
</script>
</body>
</html>
