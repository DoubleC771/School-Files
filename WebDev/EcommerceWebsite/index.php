<?php
session_start();
if (isset($_SESSION["user_id"])) {
   include ("db_connection.php");
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
}

?>

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
                     <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
               </ul>
               <form class="form-inline my-2 my-lg-0">
                  <div class="login_menu">
                     <ul>
                        <!-- php goes here -->
                        <?php if ($user['UserType'] == 1 OR $user['UserType'] == 2) {
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
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">(BRAND)</h1>
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
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">(Brand)</h1>
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
                              <div class="image_1"><img src="images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">(Brand)</h1>
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
                        <div class="image_2"><img src="images/img-2.png"></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <h1 class="cycles_text">Cycles</h1>
                     <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                     <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <h4 class="price_text">Price <span style=" color: #f7c17b">$</span> <span style=" color: #325662">200</span></h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="cycle_section_3 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <h1 class="cycles_text">Stylis Cycle</h1>
                     <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                     <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <h4 class="price_text">Price <span style=" color: #f7c17b">$</span> <span style=" color: #325662">200</span></h4>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="box_main_3">
                        <h6 class="number_text_2">02</h6>
                        <div class="image_2"><img src="images/img-3.png"></div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="cycle_section_2 layout_padding">
               <div class="row">
                  <div class="col-md-6">
                     <div class="box_main_3">
                        <h6 class="number_text_2">03</h6>
                        <div class="image_2"><img src="images/img-4.png"></div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <h1 class="cycles_text">Mordern <br>Cycle</h1>
                     <p class="lorem_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters</p>
                     <div class="btn_main">
                        <div class="buy_bt"><a href="#">Buy Now</a></div>
                        <h4 class="price_text">Price <span style=" color: #f7c17b">$</span> <span style=" color: #325662">200</span></h4>
                     </div>
                  </div>
               </div>
            </div>
            <div class="read_btn_main">
               <div class="read_bt"><a href="#">Read More</a></div>
            </div>
         </div>
      </div>
      <!-- cycle section end -->
      <!-- about section start -->
      <div class="about_section layout_padding">
         <div class="container">
            <h1 class="about_taital">About FL BIKES</h1>
            <p class="about_text">FL Bikes is Cebu's premier online store for pro-level and boutique cycling components. Owned by multi-awarded bike builder Francis Lim, we offer high-end products from top brands like BMC, Cannondale, and KASK. Our inventory includes frames, wheels, brakes, forks, and accessories. Plus, we offer custom bike building services to suit your needs. Upgrade your cycling game with FL Bikes!
            </p>
            <div class="about_main">
               <img src="images/img-5.png" class="image_5">
            </div>
            <div class="read_bt_1"><a href="#">Read More</a></div>
         </div>
      </div>
      <!-- about section end -->
      <!-- client section start -->
      <div class="client_section layout_padding">
         <div id="my_slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <div class="container">
                     <div class="client_main">
                        <h1 class="client_taital">CUSTOMER REVIEWS</h1>
                        <div class="client_section_2">
                           <div class="client_left">
                              <div><img src="images/martincustomer.jpg" class="client_img"></div>
                           </div>
                           <div class="client_right">
                              <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              <p class="client_text">"I recently purchased a custom-built bike from FL Bikes, and I couldn't be happier with my purchase! The staff was incredibly knowledgeable and helped me choose the perfect components for my riding style. The build quality is top-notch, and the attention to detail is evident in every aspect of the bike. The online shopping experience was seamless, and my bike was delivered to my doorstep in no time. I highly recommend FL Bikes to anyone looking for quality components and excellent customer service!"</p>
                              <h3 class="client_name">-Martin Daguia</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="client_main">
                        <h1 class="client_taital">CUSTOMER REVIEWS</h1>
                        <div class="client_section_2">
                           <div class="client_left">
                              <div><img src="images/paj.png" class="client_img"></div>
                           </div>
                           <div class="client_right">
                              <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              <p class="client_text">FL Bikes exceeded my expectations with their exceptional customer service and product quality. I was in the market for a new bike and found exactly what I was looking for on their website. The ordering process was simple, and my bike arrived quickly and in perfect condition. The attention to detail in the assembly was impressive, and the bike has been a joy to ride. I appreciate the personalized approach that FL Bikes takes, and I would definitely recommend them to anyone in the market for a top-quality bike or cycling components.</p>
                              <h3 class="client_name">-Joshua Pajarillo</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="carousel-item">
                  <div class="container">
                     <div class="client_main">
                        <h1 class="client_taital">Says Customers</h1>
                        <div class="client_section_2">
                           <div class="client_left">
                              <div><img src="images/petersagan.png" class="client_img"></div>
                           </div>
                           <div class="client_right">
                              <div class="quote_icon"><img src="images/quote-icon.png"></div>
                              <p class="client_text">I recently purchased some bike parts from FL Bikes, and I'm extremely satisfied with my experience. The website was user-friendly, and I was able to easily find the components I needed. The prices were competitive, and the shipping was fast. The parts arrived well-packaged and in excellent condition. I appreciate the high-quality of the components and the excellent customer service I received. I would highly recommend FL Bikes to anyone looking for top-notch cycling components!</p>
                              <h3 class="client_name">-Peter Sagan</h3>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <a class="carousel-control-prev" href="#my_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
            </a>
            <a class="carousel-control-next" href="#my_slider" role="button" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
         </div>
      </div>
      <!-- client section end -->
     
      <!-- contact section start -->
      <div class="contact_section layout_padding">
         <div class="container">
            <div class="contact_main">
               <h1 class="request_text">A Call Back</h1>
               <form action="/action_page.php">
                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Name" name="Name">
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Email" name="Name">
                  </div>
                  <div class="form-group">
                     <input type="text" class="email-bt" placeholder="Phone Numbar" name="Email">
                  </div>
                  <div class="form-group">
                     <textarea class="massage-bt" placeholder="Massage" rows="5" id="comment" name="Massage"></textarea>
                  </div>
               </form>
               <div class="send_btn"><a href="#">SEND</a></div>
            </div>
         </div>
      </div>
      <!-- contact section end -->
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