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



	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>PHP Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel = "stylesheet" href = "style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;300;600&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
</head>
<body>
    <form method="post" action="signup.php">
    <div class = "form-container" id = "table-container">
    <h1>Sign up</h1>
    <div class="form-row">
    <div class="col">
    <label for="FirstName">First Name</label>
      <input type="text" class="form-control" placeholder="First name" name = "firstname">
    </div>
    <div class="col">
    <label for="Last Name">Last Name</label>
      <input type="text" class="form-control" placeholder="Last name" name = "lastname">
    </div>
    <div class="form-group">
    <label for="inputAddress">Address</label>
    <input type="text" class="form-control" name="address" placeholder="1234 Main St">
  </div>
  <div class="form-group">
    <label for="inputAddress2">City</label>
    <input type="text" class="form-control" name="city" placeholder="Bacolod City">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Username</label>
    <input type="text" class="form-control" name="username" placeholder="deeznuts">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Password</label>
    <input type="password" class="form-control" name="password" placeholder="ilovetrains101">
  </div>
  <table>
    <thead>
  <tr>
		<td> 
            
      <input type="submit" name="submit" value="Submit" class = "btn btn-primary">
        
      </div>		
		</td>
	</tr> 
  <thead>
  <table>
</form>
</body>
</html> 