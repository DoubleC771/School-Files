<?php
session_start();
session_destroy();              //used to logout the user
header("location: index.html"); //after it does logout the user, the user would then be redirected to the home page
exit;
?>