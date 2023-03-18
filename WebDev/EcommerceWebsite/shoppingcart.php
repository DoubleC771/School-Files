<?php 
session_start();
if (isset($_SESSION["user_id"])) {
   include ("db_connection.php");
}

if (isset($_POST['update_update_btn'])) {

    $update_quantity = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $updatequery = mysqli_query($conn, "UPDATE `cart` SET `Quantity` = '$update_quantity' WHERE `OrderID` = '$update_id'");

    if ($updatequery) {
        header('location:shoppingcart.php');
    }
}

if (isset($_GET['removeid'])) {
    $id = $_GET['removeid'];

    $sql = "DELETE FROM `cart` where `OrderID`=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:shoppingcart.php');
    } else {
        die (mysqli_error($conn));
    }
}

if (isset($_GET['delete_all'])) {
    $id = $_GET['delete_all'];

    $sql = "DELETE FROM `cart`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:shoppingcart.php');
    } else {
        die (mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
    <head>
	<title> Shopping Cart </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel = "stylesheet" href = "style.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
    </head>
    <body>
    <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Cycle</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.min.css">
      <link rel="stylesoeet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- header section start -->
      <div class="header_section header_bg">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="index.php" class="logo"><img src="images/logo.png"></a>
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
                     <a class="nav-link" href="shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="news.php">News</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
               </ul>
               <form class="form-inline my-2 my-lg-0">
                  <div class="login_menu">
                     <ul>
                        <!-- php goes here -->
                        <?php if (isset($user)): ?>

                           <li><a href="myaccount.php"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php">Logout</a></li>

                        <?php else: ?>
                           <li><a href="login.php">Login</a></li>
                           <li><a href="signup.php ">Sign Up</a></li>

                        <?php endif; ?>

                        <?php 
                        
                        $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die ("Query Failed");
                        $cart_count = mysqli_num_rows($select_rows);

                        ?>
                        <li><a href="shoppingcart.php"><img src="images/trolly-icon-black.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                        <li><a href="#"><img src="images/search-icon-black.png"></a></li>
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
                <?php 
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                $total = 0;
                $subtotal = 0;
                if (mysqli_num_rows($select_cart) > 0) {
                    while ($result = mysqli_fetch_assoc($select_cart)) {
                ?>

                <tr>
                    <td> <img src = "ShoppingImages/<?php echo $result['Image']; ?>" </td>
                    <td> <?php echo $result['BikeName']; ?> </td>
                    <td> $<?php echo $result['Price']; ?> </td>
                    <td> 
                        <form action = "" method = "post">
                            <input type = "hidden" name = "update_quantity_id" value = "<?php echo $result['OrderID']; ?> ">
                            <input type = "number" class = "form-control" id = "typeNumber" name = "update_quantity" min = "1" value = "<?php echo $result['Quantity']; ?>">
                            <input type = "submit" value = "Update" name = "update_update_btn" class = "btn btn-secondary">
                        </form>
                    </td>
                    <td>$<?php echo $subtotal = (int)($result['Price'] * (int)$result['Quantity']); ?></td>
                    <td><a href = 'shoppingcart.php?removeid=<?php echo $result['OrderID']; ?>' onclick ="return confirm('Remove item from cart?')" class = "btn btn-warning">Remove</a></td>
                </tr>

                <?php 
                    $total += (int)$subtotal;
                    };
                } else {
                    echo "
                    <tr>
						<td> No results. </td>
					</tr>";
                };
                ?>
                <tr>
                    <td><a href = "shop.php" class = "btn btn-info"> Continue Shopping? </td>
                    <td colspan = "3">Grand Total</td>
                    <td> $<?php echo $total; ?> </td>
                    <td> <a href = "shoppingcart.php?delete_all" onclick ="return confirm('Remove all items from the cart?')" class = "btn btn-danger">Remove all</a></td>
                </tr>

            </tbody>
        </table>
        <div class="d-grid gap-2 col-6 mx-auto">
        <a href = "checkout.php" class = "btn btn-outline-primary" style ="margin-bottom: 5rem">Checkout</a>
      </div>
    </div>
        <div class="footer_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-sm-12 padding_0">
                  <div class="map_main">
                     <div class="map-responsive">
                       <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-12">
                  <div class="call_text"><a href="#"><img src="images/map-icon.png"><span class="padding_left_0">Page when looking at its layou</span></a></div>
                  <div class="call_text"><a href="#"><img src="images/call-icon.png"><span class="padding_left_0">Call Now  +01 123467890</span></a></div>
                  <div class="call_text"><a href="#"><img src="images/mail-icon.png"><span class="padding_left_0">demo@gmail.com</span></a></div>
                  <div class="social_icon">
                     <ul>
                        <li><a href="#"><img src="images/fb-icon1.png"></a></li>
                        <li><a href="#"><img src="images/twitter-icon.png"></a></li>
                        <li><a href="#"><img src="images/linkedin-icon.png"></a></li>
                        <li><a href="#"><img src="images/instagram-icon.png"></a></li>
                     </ul>
                  </div>
                  <input type="text" class="email_text" placeholder="Enter Your Email" name="Enter Your Email">
                  <div class="subscribe_bt"><a href="#">Subscribe</a></div>
               </div>
            </div>
         </div>
      </div>
      <div class="copyright_section">
         <div class="container">
            <p class="copyright_text">Copyright 2019 All Right Reserved By.<a href="https://html.design"> Free  html Templates</p>
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
