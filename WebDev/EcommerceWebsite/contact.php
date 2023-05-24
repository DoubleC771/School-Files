<?php                            // skip this page as most explanations are in about.php
session_start();                 // comments are more or less the same with about.php
include ("db_connection.php");
if (isset($_SESSION["user_id"])) {
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
   $admin = $user['UserType'] == 1;
   $norm = $user['UserType'] == 0;
}
$select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die ("Query Failed");
$cart_count = mysqli_num_rows($select_rows);
?>

<html>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- stylesheeeeets useeeeeed for da website -->
      <title>Contact</title>
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
      <!-- nav bar of da website -->
      <?php
include('header.php');
?>
         <!-- end of navbarrrrr -->
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
                              <div class="contact_bt"><a href="cycle.php">Shop Now</a></div>
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
                              <div class="contact_bt"><a href="cycle.php">Shop Now</a></div>
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
                              <div class="contact_bt"><a href="cycle.php">Shop Now</a></div>
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
      <?php
include('footer.php');
?>
      <!-- footer section end -->
      <!-- copyright section start -->
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