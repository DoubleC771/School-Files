<?php 
$is_invalid = false; //will be used later on to display an error message if either or both inputs are incorrect
include("db_connection.php");
   if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $sql = sprintf("SELECT * FROM logintable WHERE username = '%s'", 
      $conn -> real_escape_string($_POST['username']));

      $result = $conn->query($sql);

      $user = $result->fetch_assoc();
      $pass = $_POST['password'];
      if ($user) {
         if (password_verify($pass, $user['password'])) { // password_verify as the password taken from the database is hashed. if password is not hashed, u can use: password(posted by the user or inputted) == password(from the database)
            session_start();
            session_regenerate_id();
            $_SESSION["user_id"] = $user["CustomerID"]; //sets the current user's user id to be the same as the one registered in the database
            header("location: index.php");
            exit;
            //$is_invalid is false here once the user has successfully inputted the correct username and pass
      } 
   } // $is_invalid is true once the user has inputted the wrong username and pass
   $is_invalid = true;
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Form</title>
  <link rel="icon" type="image/png" href="images/logo2.png">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="login.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Login</title>
	  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
	  <link rel="stylesheet" type="text/css" href="./css/bootstrap-icons.css">
</head>
<body>
    <div class = "bodybg2">
</div>
    <form method="POST">
    <div class="row col-md-4 border rounded mx-auto mt-5 p-4 shadow">
			
			<div class="h2">Login</div>
      <?php // if $is_invalid is true then it would display the error in the following line after (?'>)
         if ($is_invalid):
      ?>
      <em style = "color:red">Invalid Login</em>
      <?php endif; ?>
			<div><small class="my-1 js-error js-error-email text-danger"></small></div>
			<div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">@</span>
			  <input name="username" type="text" class="form-control p-3" placeholder="Username" >
			</div>
			<div class="input-group mb-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-key"></i></span>
			  <input name="password" type="password" class="form-control p-3" placeholder="Password" >
			</div>
			<div class="progress my-3 d-none">
			  <div class="progress-bar" role="progressbar" style="width: 50%;" >Working... 25%</div>
			</div>
			<button class="btn btn-primary col-12">Login</button>
			<div class="m-2">
				Don't have an account? <a href="signup.php">Signup here</a>
			</div>
		</div>
    </form>
</body>
</html>