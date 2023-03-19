<?php
session_start();
if (isset($_SESSION["user_id"])) {
   include ("db_connection.php");
   $sql = "SELECT * FROM `logintable` WHERE CustomerID = {$_SESSION["user_id"]}";
   $result = $conn->query($sql);
   $user = $result->fetch_assoc();
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
      <link rel="stylesheet" type="text/css" href="myaccount.css">
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
      <meta charset="utf-8">
	   <meta name="viewport" content="width=device-width, initial-scale=1">
	   <title>Profile</title>
	   <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	   <link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
   </head>
   <body>
         <div class= "bodybg">
         </div>
        <div class="header_section header_bg">
         <nav class="navbar navbar-expand-lg navbar-light">
            <a href="index.php" class="logo"><img src="images/logo2.png"></a>
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
                     <?php if ($user['UserType'] == 1): ?>
                           <li><a href="myaccount.php"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php">Logout</a></li>
                           <li><a href="shoppingcart.php"><img src="images/trolly-icon.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                           <li><a href="#"><img src="images/search-icon.png"></a></li>
                           <li><a href="display.php">Admin</a></li>
                     <?php elseif ($norm): ?>
                           <li><a href="myaccount.php"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php">Logout</a></li>
                           <li><a href="shoppingcart.php"><img src="images/trolly-icon.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                           <li><a href="#"><img src="images/search-icon.png"></a></li>
                     <?php elseif (!isset($user)): ?>
                           <li><a href="login.php">Login</a></li>
                           <li><a href="signup.php ">Sign Up</a></li>
                           <li><a href="shoppingcart.php"><img src="images/trolly-icon.png"></a></li>
                           <li><a href="#"><img src="images/search-icon-black.png"></a></li>
                     <?php endif; ?>
                        </ul>
                  </div>
                  <div></div>
               </form>
            </div>
            <div id="main">
               <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="images/toggle-icon.png" style="height: 30px;"></span>
            </div>
         </nav>
        </div>
      </div>
   </div>
   <br>
   <!-- Start here for account table -->

   <div class="row col-lg-8 border rounded mx-auto mt-5 p-2 shadow-lg">
			<div class="col-md-4 text-center">
            <img src="<?=get_image($user['Image'])?>" class="img-fluid rounded" style="width: 180px;height:180px;object-fit: cover;">
         <div>
                  <a href="update.php?updateid=<?php echo $user['CustomerID']?>">
							<button class="mx-auto m-1 btn-sm btn btn-primary">Edit</button>
						</a>
						<a href="delete.php?deleteid=<?php echo $user['CustomerID']?>">
							<button class="mx-auto m-1 btn-sm btn btn-warning text-white">Delete</button>
						</a>
						<a href="logout.php">
							<button class="mx-auto m-1 btn-sm btn btn-info text-white">Logout</button>
						</a>
         </div>
         </div>
         <div class="col-md-8">
				<div class="h2">User Profile</div>
				<table class="table table-striped">
					<tr><th colspan="2">User Details:</th></tr>
					<tr><th><i class="bi bi-person-circle"></i> First Name</th><td><?php echo $user['firstname']; ?></td></tr>
					<tr><th><i class="bi bi-person-square"></i> Last Name</th><td><?php echo $user['lastname'];?></td></tr>
					<tr><th><i class="bi bi-shop"></i> Address</th><td><?php echo $user['address'];?></td></tr>
					<tr><th><i class="bi bi-geo-alt-fill"></i> City </th><td><?php echo $user['city'];?></td></tr>
               <tr><th><i class="person-fill"></i> Username</th><td><?php echo $user['username'];?></td></tr>
               <tr><th><i class="pass"></i> Password</th><td><?php echo $user['password'];?></td></tr>
				</table>
			</div>
		</div>
   </div>
</div>
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