<?php 
session_start();
include ("db_connection.php");
if (isset($_SESSION["user_id"])) {
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
   $admin = $user['UserType'] == 1;
   $norm = $user['UserType'] == 0;
}

if (isset($_POST['update_update_btn'])) { //update button is used to update the quantity of the item 
    $update_quantity = $_POST['update_quantity']; //yoinked from hidden input types (same principle as the one present in cycle.php but instead of inserting variables into the database, we update the contents instead) yoink to store into variables, use said variables to update the contents of the database 
    $update_id = $_POST['update_quantity_id']; //yoinked too from hidden input types
    $updatequery = mysqli_query($conn, "UPDATE `cart` SET `Quantity` = '$update_quantity' WHERE `OrderID` = '$update_id'");
    if ($updatequery) {
        header('location:shoppingcart.php');
    }
}

if (isset($_GET['removeid'])) { //similar to the ones present in the admin panel (refer to display.php)
    $id = $_GET['removeid'];

    $sql = "DELETE FROM `cart` where `OrderID`=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:shoppingcart.php');
    } else {
        die (mysqli_error($conn));
    }
}

if (isset($_GET['delete_all'])) { //deleteeee everything from caaaaarrrrtttt
    $id = $_GET['delete_all'];

    $sql = "DELETE FROM `cart`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:shoppingcart.php');
    } else {
        die (mysqli_error($conn));
    }
}
$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die ("Query Failed");
$cart_count = mysqli_num_rows($select_rows);
?>
<!DOCTYPE html>
    <head>
      <!-- holee fk laba2 -->
	   <title> Shopping Cart </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel = "stylesheet" href = "style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <meta charset="utf-8">
         <meta http-equiv="X-UA-Compatible" content="IE=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <meta name="viewport" content="initial-scale=1, maximum-scale=1">
         <meta name="keywords" content="">
         <meta name="description" content="">
         <meta name="author" content="">
         <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
         <link rel="stylesheet" type="text/css" href="css/style.css">
         <link rel="stylesheet" href="css/responsive.css">
         <link rel="icon" href="images/fevicon.png" type="image/gif" />
         <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
         <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
         <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap" rel="stylesheet">
         <link rel="stylesheet" href="css/owl.carousel.min.css">
         <link rel="stylesoeet" href="css/owl.theme.default.min.css">
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    </head>
    <body>
   <body>
      <!-- header section start -->
      <div class="header_section header_bg">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="index.php" class="logo"><img src="images/logo2.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="about.php">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="cycle.php">Our Cycle</a>
                  </li>

                  <li class="nav-item">
                     <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
               </ul>
               <form class="form-inline my-2 my-lg-0">
                  <div class="login_menu">
                     <ul>
                     <?php if (isset($user) && $user['UserType'] == 1): ?>
                           <li><a href="myaccount.php"style = "color:black"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php" style = "color:black">Logout</a></li>
                           <li><a href="shoppingcart.php"style = "color:black"><img src="images/trolly-icon.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                           <li><a href="#"style = "color:black"><img src="images/search-icon.png"></a></li>
                           <li><a href="display.php" style = "color:black">Admin</a></li>
                           <li><a href="sales.php">Sales Report</a></li>
                     <?php elseif (isset($norm) && $norm): ?>
                           <li><a href="myaccount.php"style = "color:black"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php"style = "color:black">Logout</a></li>
                           <li><a href="shoppingcart.php"style = "color:black"><img src="images/trolly-icon-black.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                           <li><a href="#"style = "color:black"><img src="images/search-icon-black.png"></a></li>
                     <?php elseif (!isset($user)): session_unset()?>
                           <li><a href="login.php"style = "color:black">Login</a></li>
                           <li><a href="signup.php "style = "color:black">Sign Up</a></li>
                           <li><a href="shoppingcart.php"style = "color:black"><img src="images/trolly-icon.png"></a></li>
                           <li><a href="#"style = "color:black"><img src="images/search-icon-black.png"></a></li>
                     <?php endif; ?>
                     </ul>
                  </div>
                  <div></div>
               </form>
            </div>
            <div id="main">
               <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="images/toggle-icon-black.png" style="height: 30px;"></span>
            </div>
         </nav>
      </div>
    <div class = "container">
        <h1 align = "center"> Shopping Cart </h1> <br>
        <table class="table table-hover">
            <thead class="table-success">
                <th scope = "col"> Image </th>
                <th scope = "col"> Bike Name </th>
                <th scope = "col"> Price </th>
                <th scope = "col"> Quantity </th>
                <th scope = "col"> Total </th>
                <th scope = "col"> Action </th>
            </thead>
            <tbody>
                <?php //display sht from cart database
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $total = 0;
                $subtotal = 0;
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($result = mysqli_fetch_assoc($select_cart)) {
                ?>

                <tr>
                    <td> <img src = "ShoppingImages/<?php echo $result['Image']; ?>"> </td>
                    <td> <?php echo $result['BikeName']; ?> </td>
                    <!-- we use number format here to display the numbers with commas so instead of displaying '14000' it would display '14,000' instead -->
                    <td> ₱<?php echo number_format($result['Price']); ?> </td>
                    <td> 
                        <form action = "" method = "post">
                           
                            <input type = "hidden" name = "update_quantity_id" value = "<?php echo $result['OrderID']; ?> ">
                            <input type = "number" class = "form-control" id = "typeNumber" name = "update_quantity" min = "1" value = "<?php echo $result['Quantity']; ?>">
                            <input type = "submit" value = "Update" name = "update_update_btn" class = "btn btn-secondary">

                            <?php if ($result['Quantity'] > 50): ?>
                              <div class="alert alert-danger" role="alert">
  Quantity Selected is over the Stock available!
</div>
<?php else: ?>
<?php endif; ?>

                            <!-- we use hidden input types to get the values from another database. After which, we will be able to store those into variables to store these variables to a diff database -->
                        </form>
                    </td>
                    <td>₱<?php echo number_format($subtotal = (int)$result['Price'] * (int)$result['Quantity']); ?></td> <!--needs int here as we are adding here-->
                    <td><a href = 'shoppingcart.php?removeid=<?php echo $result['OrderID']; ?>' onclick ="return confirm('Remove item from cart?')" class = "btn btn-warning">Remove</a></td>
                    <!--get removeid to specify which item in the cart should be removed-->
                </tr>

                <?php //adds all the subtotal found so far into $total
                    $total += ($subtotal);
                    };
                } else {
                    echo "
                    <tr>
						<td> No results. </td>
					</tr>";
                }; //stores the $total into the session which we will be able to access later on
                $_SESSION['total'] = $total ?>
                <tr>
                    <td><a href = "cycle.php" class = "btn btn-info"> Continue Shopping? </td>
                    <td colspan = "3">Grand Total</td>
                    <td> ₱<?php echo number_format($total); ?> </td>
                    <td> <a href = "shoppingcart.php?delete_all" onclick ="return confirm('Remove all items from the cart?')" class = "btn btn-danger">Remove all</a></td>
                </tr>

            </tbody>
        </table>
        <div class="d-grid gap-2 col-6 mx-auto">
        <a href = "checkout.php" class = "btn btn-outline-primary" style ="margin-bottom: 5rem">Checkout</a> <!-- checkout is not working yeeeeeet -->
      </div>
    </div>
    <?php
include('footer.php');
?>
      <div class="copyright_section">
         <div class="container">
         <p class="copyright_text">Copyright 2023 All Right Reserved By.<a href="https://www.facebook.com/Ph4se0ne"> INV Studios</p>
         </div>
      </div>
      <!-- copyright section end -->    
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/plugin.js"></script>
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <!-- javascript --> 
      <script src="js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
           document.getElementById("main").style.marginLeft = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
           document.getElementById("main").style.marginLeft= "0";
          
         }

         $("#main").click(function(){
             $("#navbarSupportedContent").toggleClass("nav-normal")
         })
      </script>
    </body>
</html>
