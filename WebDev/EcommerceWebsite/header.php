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
                           <li><a href="myaccount.php"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php">Logout</a></li>
                           <li><a href="shoppingcart.php"><img src="images/trolly-icon.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                           <li><a href="#"><img src="images/search-icon.png"></a></li>
                           <li><a href="display.php">Admin</a></li>
                           <li><a href="sales.php">Sales Report</a></li>
                     <?php elseif (isset($norm) && $norm): ?>
                           <li><a href="myaccount.php"><?= htmlspecialchars($user['firstname'])?></a></li>
                           <li><a href="logout.php">Logout</a></li>
                           <li><a href="shoppingcart.php"><img src="images/trolly-icon.png"><span class="position-absolute top-50 start-55 translate-middle badge rounded-pill bg-danger"><?php echo $cart_count?></span></a></li>
                           <li><a href="#"><img src="images/search-icon.png"></a></li>
                     <?php elseif (!isset($user)): ?>
                           <li><a href="login.php">Login</a></li>
                           <li><a href="signup.php ">Sign Up</a></li>
                           <li class="alert-li"><a href="javascript:void(0);" onclick="alert('Please login to access the shopping cart.');"><img src="images/trolly-icon.png"></a></li>
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