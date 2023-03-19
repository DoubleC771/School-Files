<?php
include("db_connection.php");
	if(isset($_POST['submit'])) {
		
		$firstname = $_POST['firstname'];
		$lastname = $_POST['lastname'];
		$address = $_POST['address'];
		$city = $_POST['city'];
    $username = $_POST['username'];
    $password = $_POST['password'];
		$sql = "INSERT INTO loginTable (firstname, lastname, address, city, username, password) VALUES ('$firstname', '$lastname', '$address', '$city', '$username', '$password')";
		$result = mysqli_query($conn, $sql);

		if (mysqli_query($conn, $sql)) {
			echo "";
		} else {
			echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
		mysqli_close($conn);
		$servername = "localhost";

    if ($result) {
      header('location:signup-success.html');
      exit();
  } else {
      die (mysqli_error($conn));
  }

	}
?>

<!DOCTYPE html>
<html>
<head>
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
    <form method="post" action="">
    <div class="row col-md-8 col-lg-4 border rounded mx-auto mt-5 p-4 shadow">
			
			<div class="h2">Signup</div>
			
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-circle"></i></span>
			  <input name="firstname" type="text" class="form-control p-3" placeholder="First name" >
			</div>
			<div><small class="js-error js-error-firstname text-danger"></small></div>
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-person-square"></i></span>
			  <input name="lastname" type="text" class="form-control p-3" placeholder="Last name" >
			</div>
			<div><small class="js-error js-error-lastname text-danger"></small></div>
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-shop"></i></span>
			  <input name="address" type="text" class="form-control p-3" placeholder="Address" >
			</div>
			<div><small class="js-error js-error-gender text-danger"></small></div>
			
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-geo-alt-fill"></i></span>
			  <input name="city" type="text" class="form-control p-3" placeholder="City" >
			</div>
			<div><small class="js-error js-error-email text-danger"></small></div>
			
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1">@</span>
			  <input name="username" type="password" class="form-control p-3" placeholder="Username" >
			</div>
			<div><small class="js-error js-error-password text-danger"></small></div>
			<div class="input-group mt-3">
			  <span class="input-group-text" id="basic-addon1"><i class="bi bi-key-fill"></i></span>
			  <input name="password" type="password" class="form-control p-3" placeholder="Password" >
			</div>
			<div class="progress mt-3 d-none">
			  <div class="progress-bar" role="progressbar" style="width: 50%;" >Working... 25%</div>
			</div>
			<button class="mt-3 btn btn-primary col-12" type = "submit" name = "submit" value = "submit">Signup</button>
			<div class="m-2">
				Already have an account? <a href="login.php">login here</a>
			</div>
		</div>
    </form>
</body>
</html> 