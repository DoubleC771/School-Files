<?php 
session_start();
if (isset($_SESSION["user_id"])) {
   include ("db_connection.php");
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
}

if (isset($_POST['add_to_cart'])) {

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE `BikeName` = '$product_name'");

   $sql = "INSERT INTO cart (BikeName, Price, Image, Quantity) VALUES ('$product_name', '$product_price', '$product_image', '$product_quantity')";

   if (mysqli_num_rows($select_cart) > 0) {
      echo "Product already in cart";
   } else {
      $result = mysqli_query($conn, $sql);
      echo "Product successfully added to cart";
   }
}
?>

<html>
<!DOCTYPE html>
<html lang="en">
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
        <div class="header_section header_bg">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="index.php" class="logo"><img src="images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent" style = "color:black">
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
                        <?php if ($user['UserType'] == 1 OR $user['UserType'] == 0) {
                           $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die ("Query Failed");
                           $cart_count = mysqli_num_rows($select_rows);
                           ?>
                           <li><a href="myaccount.php"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php">Logout</a></li>
                           <li><a href="shoppingcart.php"><img src="images/trolly-icon.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                           <li><a href="#"><img src="images/search-icon.png"></a></li>
                        <?php if ($user['UserType'] == 1) { ?>
                           <li><a href="display.php">Admin</a></li>
                        <?php }} else { ?>
                           <li><a href="login.php">Login</a></li>
                           <li><a href="signup.php ">Sign Up</a></li>
                           <li><a href="shoppingcart.php"><img src="images/trolly-icon.png"></a></li>
                           <li><a href="#"><img src="images/search-icon.png"></a></li>
                        <?php } ?>
                        </ul>
                  </div>
                  <div></div>
               </form>
            </div>
            <div id="main">
               <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="images/toggle-icon.png" style="height: 30px;"></span>
            </div>
         </nav>
            <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="images/bike.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital"> 2023 Canyon Aeroad CF SLX 7 Disc Etap</h1>
                              <p class="banner_text">Go green, get a bike! It's healthy, eco-friendly, and cost-effective. </p>
                              <div class="contact_bt"><a href="contact.php">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="images/bike2.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital"> 2023 Canyon LUX World Cup CF 7</h1>
                              <p class="banner_text">Experience cycling joy! Our affordable, efficient bikes are perfect for commuting or leisure. </p>
                              <div class="contact_bt"><a href="contact.php">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="images/bike3.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">2023 Canyon Exceed CF 7</h1>
                              <p class="banner_text">Ride to a better you! Our comfortable bikes are perfect for urban commuters and fitness enthusiasts.  </p>
                              <div class="contact_bt"><a href="contact.php">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->
      <!-- cycle section start -->
   <div class="cycle_section layout_padding">
      <div class="container">
         <h1 class="cycle_taital">Our cycle</h1>
         <p class="cycle_text">Upgrade your ride with our premium bikes!<br> Crafted with the best materials and advanced tech, they're durable, reliable, and comfortable.</p>
         <div class="cycle_section_2 layout_padding">
            <div class="row">
               <div class="col-md-6">
                  <div class="box_main">
                     <h6 class="number_text">01</h6>
                     <div class="image_2"><img src="images/bike4.png"></div>
                  </div>
               </div>
               <div class="col-md-6">
                  <h1 class="cycles_text">Factor O2 Carbon Road Frameset</h1>
                  <p class="lorem_text">For anyone who lives in a hilly region, or simply enjoys the feeling of riding a super lightweight bike, the Factor O2 VAM proves to be the ultimate racing bike for hill climbing, stable descending, and all round ass kicking. The super lightweight Factor O2 VAM is the best choice for riders looking to get every last ounce out of their power output.
                    </p>
                  <div class="btn_main">
                     <div class="buy_bt"><a href="#">Buy Now</a></div>
                     <h4 class="price_text">Price <span style=" color: #f7c17b">₱</span> <span style=" color: #325662">320,000</span></h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="cycle_section_3 layout_padding">
            <div class="row">
               <div class="col-md-6">
                  <h1 class="cycles_text">S-Works SL7 frameset</h1>
                  <p class="lorem_text">Introducing the new Tarmac bike: the ultimate race bike without compromise. With advanced technologies like the FreeFoil Shape Library and Rider-First Engineered frame, you no longer have to choose between aerodynamics and weight or ride quality and speed. This bike is both the lightest and fastest allowed by UCI regulations. The S-Works Tarmac Frameset is the ideal starting point for your custom build. Get ready to ride fast with your dream bike.</p>
                  <div class="btn_main">
                     <div class="buy_bt"><a href="#">Buy Now</a></div>
                     <h4 class="price_text">Price <span style=" color: #f7c17b">₱</span> <span style=" color: #325662">345,000</span></h4>
                  </div>
               </div>
               <div class="col-md-6">
                  <div class="box_main_3">
                     <h6 class="number_text_2">02</h6>
                     <div class="image_2"><img src="images/bike5.png"></div>
                  </div>
               </div>
            </div>
         </div>
         <div class="cycle_section_2 layout_padding">
            <div class="row">
               <div class="col-md-6">
                  <div class="box_main_3">
                     <h6 class="number_text_2">03</h6>
                     <div class="image_2"><img src="images/bike6.png"></div>
                  </div>
               </div>
               <div class="col-md-6">
                  <h1 class="cycles_text">Canyon Torque CF 8</h1>
                  <p class="lorem_text">Bike park laps or enduro trails? 29 or 27.5 inch wheels? With the brand-new Torque CF 8, get the best of all worlds thanks to mullet wheel sizing and a progressive, highly-adjustable geometry.</p>
                  <div class="btn_main">
                     <div class="buy_bt"><a href="#">Buy Now</a></div>
                     <h4 class="price_text">Price <span style=" color: #f7c17b">₱</span> <span style=" color: #325662">243,360</span></h4>
                  </div>
               </div>
            </div>
         </div>
         <div class="read_btn_main">
            <div class="read_bt"><a href="#">Read More</a></div>
         </div>
      </div>
   </div>
   <div class = "container">
        <h1 align = "center"> All Bike Models </h1> <br>
        <?php 
            include ("db_connection.php");
            $query = "SELECT * FROM `bikeorder` ORDER by `OrderID` ASC";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0 ) {
                while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <form action = "" method = "post">
                           <div class = "card-deck">
                              <div class = "card">
                              <img src = "ShoppingImages/<?php echo $row["Image"]; ?>" class = "card-img-top">
                              <div class = "card-body">
                                 <h3 class = "card-title"><?php echo $row["BikeName"]; ?></h3>
                                 <p class = "card-text"> <?php echo $row["Description"]; ?> </p>
                                 <p class = "card-text" style = "color:red"> Stocks Available: <?php echo $row["Stocks"]; ?> </p>
                                 <div class="price">₱<?php echo number_format($row["Price"]); ?></div>
                                 <input type="hidden" name = "product_name" value = "<?php echo $row["BikeName"]; ?>">
                                 <input type="hidden" name = "product_price" value = "<?php echo $row["Price"]; ?>">
                                 <input type="hidden" name = "product_image" value = "<?php echo $row["Image"]; ?>">
                                 <input type ="submit" class = "btn btn-primary" value = "Add to Cart" name = "add_to_cart">
                              </div>
                              </div>
                           </div>
                        </form>
                        <br>
                    <?php
                }
            } else {
                echo "No results found.";
            }
        ?>
        </div>
   <!-- cycle section end -->
      <!-- footer section start -->
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
      <!-- footer section end -->
      <!-- copyright section start -->
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